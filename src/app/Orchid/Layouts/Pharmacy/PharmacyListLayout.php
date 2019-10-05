<?php

namespace App\Orchid\Layouts\Pharmacy;

use App\Contract\Entity\Pharmacy\Field\LabelInterface;
use App\Contract\Entity\Pharmacy\Field\NameInterface as FieldNameInterface;
use App\Entity\Pharmacy\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;
use App\Repositories\WarehouseRepository;
use Illuminate\Support\Collection;

class PharmacyListLayout extends ListLayout
{
    const DATA_KEY = 'pharmacy';

    const COLUMN_PREFIX_WAREHOUSE = 'wh-';

    /**
     * @var WarehouseRepository
     */
    private $warehouseRepository;

    public function __construct(
        RouteNameProvider $routeNameProvider,
        WarehouseRepository $warehouseRepository
    )
    {
        $this->warehouseRepository = $warehouseRepository;
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
        return self::COLUMN_PREFIX_WAREHOUSE . $warehouseId;
    }

    private function getWarehousesCodes(): Collection
    {
        return $this->warehouseRepository->getWarehousesCodes();
    }

    private function getProductColumns()
    {
        return [
            TD::set(FieldNameInterface::ID, LabelInterface::ID),

            $this->getNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

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
