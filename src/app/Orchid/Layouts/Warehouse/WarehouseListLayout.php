<?php

namespace App\Orchid\Layouts\Warehouse;

use App\Contract\Entity\Warehouse\Field\LabelInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as WarehouseFieldNameInterface;
use App\Contract\Entity\Warehouse\Route\NameInterface as WarehouseRouteNamesInterface;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class WarehouseListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $data = 'warehouses';

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            TD::set(WarehouseFieldNameInterface::NAME, LabelInterface::NAME)
                ->link(
                    WarehouseRouteNamesInterface::EDIT,
                    WarehouseFieldNameInterface::ID,
                    WarehouseFieldNameInterface::NAME
                ),
            TD::set(WarehouseFieldNameInterface::CODE, LabelInterface::NOTE),
            TD::set(WarehouseFieldNameInterface::NOTE, LabelInterface::NOTE),
            TD::set(WarehouseFieldNameInterface::CREATED_AT, LabelInterface::CREATED_AT),
            TD::set(WarehouseFieldNameInterface::UPDATED_AT, LabelInterface::UPDATED_AT),
        ];
    }
}
