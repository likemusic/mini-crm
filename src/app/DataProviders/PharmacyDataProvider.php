<?php

namespace App\DataProviders;

use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\Product\TableInterface as ProductTableInterface;
use App\Contract\Entity\StockItem\Field\NameInterface as StockItemFieldNameInterface;
use App\Contract\Entity\StockItem\TableInterface as StockItemTableInterface;
use App\Helper\Entity\PharmacyHelper;
use App\Model\Pharmacy;
use App\Repositories\WarehouseRepository;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\Repository;
use App\Contract\Entity\Pharmacy\Field\NameInterface as PharmacyFieldNameInterface;

class PharmacyDataProvider
{
    /**
     * @var WarehouseRepository
     */
    private $warehouseRepository;

    /**
     * @var PharmacyHelper
     */
    private $pharmacyHelper;

    /**
     * @var Pharmacy
     */
    private $pharmacy;

    public function __construct(
        WarehouseRepository $warehouseRepository,
        PharmacyHelper $pharmacyHelper
//        Pharmacy $pharmacy
    )
    {
        $this->warehouseRepository = $warehouseRepository;
        $this->pharmacyHelper = $pharmacyHelper;
//        $this->pharmacy = $pharmacy;
    }

    public function all()
    {
        $productTableName = ProductTableInterface::NAME;
        $productTableAlias = 'p';
        $builder = $this->getQueryBuilder($productTableName, $productTableAlias);

        $this->addJoins($builder, $productTableAlias);

        return $this->getRepositoriesArrayByBuilder($builder);
    }

    private function getRepositoriesArrayByBuilder(Builder $builder)
    {
        $ret = $builder->get();
        $arr = $ret->toArray();
        $repositories = $this->arrayToRepositories($arr);

        return $repositories;
    }


    public function addJoins(Builder $builder, $productTableAlias)
    {
        $sortedWarehouseIds = $this->getSortedWarehouseIds();
        $stockItemTablesAliases = $this->getStockItemTableAliases($sortedWarehouseIds);

        $this->joinWarehousesQuantities($builder, $productTableAlias, $sortedWarehouseIds, $stockItemTablesAliases);
        $builder
            ->addSelect($this->buildFieldName($productTableAlias, ProductFieldNameInterface::ID))
            ->addSelect(ProductFieldNameInterface::NAME)
            ->addSelect(ProductFieldNameInterface::APPROXIMATE_PRICE)
            ->addSelect(ProductFieldNameInterface::SELLING_PRICE);

        $this->addSelectTotalWarehouseQuantities($builder, $stockItemTablesAliases);
        $this->addSelectTotalWarehouseAmount($builder, $stockItemTablesAliases);
    }


    private function addSelectTotalWarehouseQuantities(Builder $builder, $stockItemTablesAliases)
    {
        $totalQuantityExpression = $this->getTotalQuantityExpression($stockItemTablesAliases);
        $columnName = PharmacyFieldNameInterface::WAREHOUSES_TOTAL_QUANTITY;
        $selectColumn = "{$totalQuantityExpression} as {$columnName}";

        $builder->addSelect(DB::raw($selectColumn));
    }

    private function getTotalQuantityExpression($stockItemTablesAliases)
    {
        $columnsList = $this->buildColumnsListByTableAliases($stockItemTablesAliases, StockItemFieldNameInterface::QUANTITY);
        $sumColumns = implode('+', $columnsList);

        return "({$sumColumns})";
    }

    private function addSelectTotalWarehouseAmount(Builder $builder, array $stockItemTablesAliases)
    {
        $sellingPriceColumnName = PharmacyFieldNameInterface::SELLING_PRICE;
        $totalAmountColumnName = PharmacyFieldNameInterface::WAREHOUSES_TOTAL_AMOUNT;
        $totalQuantityExpression = $this->getTotalQuantityExpression($stockItemTablesAliases);

        $selectColumn = "({$totalQuantityExpression} * {$sellingPriceColumnName}) as {$totalAmountColumnName}";

        $builder->addSelect(DB::raw($selectColumn));
    }

    private function buildColumnsListByTableAliases($tableAliases, $columnName)
    {
        $ret = [];

        foreach ($tableAliases as $tableAlias) {
            $ret[$tableAlias] = $this->buildFieldName($tableAlias, $columnName);
        }

        return $ret;
    }

    private function getStockItemTableAliases(array $warehouseIds)
    {
        $ret = [];

        foreach ($warehouseIds as $warehouseId) {
            $stockItemTableAlias = $this->getStockItemTableAlias($warehouseId);
            $ret[$warehouseId] = $stockItemTableAlias;
        }

        return $ret;
    }

    private function getSortedWarehouseIds()
    {
        return $this->getSortedWarehouseIdsCollection()->toArray();
    }

    private function getSortedWarehouseIdsCollection(): Collection
    {
        return $this->warehouseRepository->getSortedIds();
    }

    private function getQueryBuilder($tableName, $tableAlias)
    {
        $productTableNameWithAlias = $this->buildTableNameWithAlias($tableName, $tableAlias);

        return DB::table($productTableNameWithAlias);
    }

    private function buildTableNameWithAlias(string $tableName, string $alias)
    {
        return "{$tableName} as {$alias}";
    }

    private function joinWarehousesQuantities(
        Builder $builder,
        string $productTableAlias,
        array $sortedWarehouseIds,
        array $stockItemTablesAliases
    ) {
        foreach ($sortedWarehouseIds as $warehouseId) {
            $stockItemTableAlias = $stockItemTablesAliases[$warehouseId];
            $this->joinWarehouseQuantity($builder, $productTableAlias, $warehouseId, $stockItemTableAlias);
        }
    }

    private function joinWarehouseQuantity(Builder $builder, string $productTableAlias, int $warehouseId, $stockItemTableAlias)
    {
        $productIdFieldName = $this->buildFieldName($productTableAlias, ProductFieldNameInterface::ID);

        $stockItemTableNameWithAlias = $this->buildTableNameWithAlias(StockItemTableInterface::NAME, $stockItemTableAlias);

        $stockItemProductIdFieldName = $this
            ->buildFieldName($stockItemTableAlias, StockItemFieldNameInterface::PRODUCT_ID);

        $stockItemWarehouseIdFieldName = $this
            ->buildFieldName($stockItemTableAlias, StockItemFieldNameInterface::WAREHOUSE_ID);

        $stockItemQuantityFieldName = $this
            ->buildFieldName($stockItemTableAlias, StockItemFieldNameInterface::QUANTITY);

        $stockItemQuantityFieldAlias = $this->getStockItemQuantityFieldAlias($warehouseId);
        $stockItemQuantityFieldNameWithAlias =
            $this->buildFieldNameWithAlias($stockItemQuantityFieldName, $stockItemQuantityFieldAlias);

        $builder->leftJoin(
            $stockItemTableNameWithAlias,
            function (JoinClause $join)
            use ($productIdFieldName, $stockItemProductIdFieldName, $stockItemWarehouseIdFieldName, $warehouseId) {
                $join
                    ->on($productIdFieldName, '=', $stockItemProductIdFieldName)
                    ->where($stockItemWarehouseIdFieldName, '=', $warehouseId);
            })
            ->addSelect($stockItemQuantityFieldNameWithAlias);
    }

    private function buildFieldName($tableName, $fieldName)
    {
        return implode('.', [$tableName, $fieldName]);
    }

    private function getStockItemTableAlias(int $id)
    {
        return "s{$id}";
    }

    private function getStockItemQuantityFieldAlias(int $warehouseId): string
    {
        return $this->pharmacyHelper->getWarehouseColumnName($warehouseId);
    }

    private function buildFieldNameWithAlias($fieldName, $fieldAlias)
    {
        return "{$fieldName} as {$fieldAlias}";
    }

    private function arrayToRepositories(array $arr)
    {
        $ret = [];

        foreach ($arr as $item) {
            $attributes = (array)$item;
            $ret[] = new Repository($attributes);
        }

        return $ret;
    }
}
