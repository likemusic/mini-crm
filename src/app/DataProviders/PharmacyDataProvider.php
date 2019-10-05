<?php

namespace App\DataProviders;

use Closure;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Contract\Entity\Product\TableInterface as ProductTableInterface;
use App\Contract\Entity\Warehouse\TableInterface as WarehouseTableInterface;
use App\Contract\Entity\StockItem\TableInterface as StockItemTableInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as WarehouseFieldNameInterface;
use App\Contract\Entity\StockItem\Field\NameInterface as StockItemFieldNameInterface;
use App\Helper\Entity\PharmacyHelper;

use App\Repositories\WarehouseRepository;
use Illuminate\Database\Query\Builder;
use App\Model\Pharmacy;
use Orchid\Screen\Repository;

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
        PharmacyHelper $pharmacyHelper,
        Pharmacy $pharmacy
    )
    {
        $this->warehouseRepository = $warehouseRepository;
        $this->pharmacyHelper = $pharmacyHelper;
        $this->pharmacy = $pharmacy;
    }

    public function all()
    {
//        $columns = ['*'];
//
//        $results = $this->pharmacy->newQuery()->get(
//            is_array($columns) ? $columns : func_get_args()
//        );
//
//        return $results;

        $sortedWarehouseIds = $this->getSortedWarehouseIds();

        $productTableName = ProductTableInterface::NAME;
        $productTableAlias = 'p';
        $builder = $this->getQueryBuilder($productTableName, $productTableAlias);

        $this->joinWarehousesQuantities($builder, $productTableAlias, $sortedWarehouseIds);
        $builder
//            ->addSelect(ProductFieldNameInterface::ID)
            ->addSelect(ProductFieldNameInterface::NAME)
            ->addSelect(ProductFieldNameInterface::APPROXIMATE_PRICE)
            ->addSelect(ProductFieldNameInterface::SELLING_PRICE)
        ;


        $ret = $builder->get();

        $arr =  $ret->toArray();

        $repositories = $this->arrayToRepositories($arr);

        return $repositories;
    }

    private function arrayToRepositories(array $arr)
    {
        $ret = [];

        foreach ($arr as $item) {
            $attributes = (array) $item;
            $ret[] = new Repository($attributes);
        }

        return $ret;
    }

    public function addJoins(Builder $builder)
    {
        $sortedWarehouseIds = $this->getSortedWarehouseIds();

        $productTableName = ProductTableInterface::NAME;
        $productTableAlias = 'p';
//        $builder = $this->getQueryBuilder($productTableName, $productTableAlias);

        $this->joinWarehousesQuantities($builder, $productTableAlias, $sortedWarehouseIds);

        $ret = $builder->get();

        return $ret->toArray();
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

    private function joinWarehousesQuantities(Builder $builder, string $productTableAlias, array $sortedWarehouseIds)
    {
        foreach ($sortedWarehouseIds as $warehouseId) {
            $this->joinWarehouseQuantity($builder, $productTableAlias, $warehouseId);
        }
    }

    private function joinWarehouseQuantity(Builder $builder, string $productTableAlias, int $warehouseId)
    {
        $productIdFieldName = $this->buildFieldName($productTableAlias, ProductFieldNameInterface::ID);
        $stockItemTableAlias = $this->getStockItemTableAlias($warehouseId);

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

    private function buildFieldNameWithAlias($fieldName, $fieldAlias)
    {
        return "{$fieldName} as {$fieldAlias}";
    }

    private function getStockItemQuantityFieldAlias(int $warehouseId): string
    {
        return $this->pharmacyHelper->getWarehouseColumnName($warehouseId);
    }

    private function getStockItemTableAlias(int $id)
    {
        return "s{$id}";
    }

    private function buildFieldName($tableName, $fieldName)
    {
        return implode('.', [$tableName, $fieldName]);
    }

    private function getSortedWarehouseIds()
    {
        return $this->getSortedWarehouseIdsCollection()->toArray();
    }

    private function getSortedWarehouseIdsCollection(): Collection
    {
        return $this->warehouseRepository->getSortedIds();
    }
}
