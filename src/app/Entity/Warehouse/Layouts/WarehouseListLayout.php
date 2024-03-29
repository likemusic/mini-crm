<?php

namespace App\Entity\Warehouse\Layouts;

use App\Contract\Entity\Warehouse\Field\LabelInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as FieldNameInterface;
use App\Entity\Warehouse\Route\NameProvider as RouteNameProvider;
use App\Entity\Base\Layouts\ListLayout;
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
            TD::set(FieldNameInterface::ID, LabelInterface::ID),
            $this->createNameField(FieldNameInterface::NAME, LabelInterface::NAME, FieldNameInterface::ID),

            TD::set(FieldNameInterface::CODE, LabelInterface::CODE),
            TD::set(FieldNameInterface::SORT_ORDER, LabelInterface::SORT_ORDER),
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
