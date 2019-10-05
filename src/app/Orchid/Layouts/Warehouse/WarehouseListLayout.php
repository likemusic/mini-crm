<?php

namespace App\Orchid\Layouts\Warehouse;

use App\Contract\Entity\Warehouse\Field\LabelInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as FieldNameInterface;
use App\Entity\Warehouse\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
use Orchid\Screen\TD;

class WarehouseListLayout extends ListLayout
{
    const DATA_KEY = 'warehouses';

    public function __construct(RouteNameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }

    protected function columns(): array
    {
        return [
            $this->getNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::CODE, LabelInterface::CODE),
            TD::set(FieldNameInterface::NOTE, LabelInterface::NOTE),
            TD::set(FieldNameInterface::CREATED_AT, LabelInterface::CREATED_AT),
            TD::set(FieldNameInterface::UPDATED_AT, LabelInterface::UPDATED_AT),
        ];
    }

    protected function getDataKey()
    {
        return self::DATA_KEY;
    }
}
