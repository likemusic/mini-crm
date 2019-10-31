<?php

namespace App\Entity\Pharmacy\Layouts;

use App\Contract\Entity\Pharmacy\Field\LabelInterface;
use App\Contract\Entity\Pharmacy\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Pharmacy\Field\NameInterface;
use App\Entity\Pharmacy\Route\NameProvider as RouteNameProvider;
use App\Entity\Base\Layouts\ListLayout;
use Orchid\Screen\TD;
use App\Repositories\WarehouseRepository;
use Illuminate\Support\Collection;
use App\Helper\Entity\PharmacyHelper;

class PharmacyListLayout extends ListLayout
{
    const DATA_KEY = 'pharmacy';

    /**
     * @var WarehouseRepository
     */
    private $warehouseRepository;

    /**
     * @var PharmacyHelper
     */
    private $pharmacyHelper;

    public function __construct(
        RouteNameProvider $routeNameProvider,
        WarehouseRepository $warehouseRepository,
        PharmacyHelper $pharmacyHelper
    )
    {
        $this->warehouseRepository = $warehouseRepository;
        $this->pharmacyHelper = $pharmacyHelper;

        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        $productColumns = $this->getProductColumns();
        $warehousesColumns = $this->getWarehousesColumns();

        return array_merge($productColumns, $warehousesColumns);
    }

    private function getWarehousesColumns()
    {
        $selectedColumns = $this->getWarehousesSelectedColumns();
        $calculatedColumns = $this->getWarehousesCalculatedColumns();

        return array_merge($selectedColumns, $calculatedColumns);
    }

    private function getWarehousesCalculatedColumns()
    {
        $columnsData = [
            FieldNameInterface::WAREHOUSES_TOTAL_QUANTITY => LabelInterface::WAREHOUSES_TOTAL_QUANTITY,
            FieldNameInterface::WAREHOUSES_TOTAL_AMOUNT => LabelInterface::WAREHOUSES_TOTAL_AMOUNT,
        ];

        return $this->arrayToColumns($columnsData);
    }

    private function arrayToColumns($columnsData)
    {
        $ret = [];

        foreach ($columnsData as $name => $label) {
            $ret[] = TD::set($name, $label);
        }

        return $ret;
    }

    private function getWarehousesSelectedColumns()
    {
        $warehousesCodes = $this->getWarehousesCodes();

        return $this->convertArrayToWarehousesColumns($warehousesCodes);
    }

    private function convertArrayToWarehousesColumns(Collection $warehousesCodes)
    {
        $warehousesCodes = $warehousesCodes->toArray();

        return $this->arrayMapWithKey([$this, 'warehouseCodeToColumn'], $warehousesCodes);
    }

    private function arrayMapWithKey(callable $callback, iterable $array)
    {
        $ret = [];

        foreach ($array as $key => $value) {
            $ret[] = $callback($value, $key);
        }

        return $ret;
    }

    private function warehouseCodeToColumn($value, $key) {
        $name = $this->warehouseColumnName($key);
        $label = $value;

        return TD::set($name, $label);
    }

    private function warehouseColumnName($warehouseId)
    {
        return $this->pharmacyHelper->getWarehouseColumnName($warehouseId);
    }

    private function getWarehousesCodes(): Collection
    {
        return $this->warehouseRepository->getSortedCodes();
    }

    private function getProductColumns()
    {
        return [
            TD::set(FieldNameInterface::ID, LabelInterface::ID),

            TD::set(FieldNameInterface::NAME, LabelInterface::NAME),
//            $routeName = $this->getRouteNameEdit();
//            $this->getLinkField($name, $label, $routeName, $id);
//            $this->getNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::CATEGORY . '.' . 'name', LabelInterface::CATEGORY),

            TD::set(FieldNameInterface::APPROXIMATE_PRICE, LabelInterface::APPROXIMATE_PRICE),
            TD::set(FieldNameInterface::SELLING_PRICE, LabelInterface::SELLING_PRICE),
        ];
    }

    protected function getDataKey()
    {
        return self::DATA_KEY;
    }
}
