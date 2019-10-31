<?php

namespace App\Orchid\Layouts\StockItem;

use App\Contract\Entity\StockItem\Field\LabelInterface;
use App\Contract\Entity\StockItem\Field\NameInterface as FieldNameInterface;
use App\Contract\Entity\Product\Field\NameInterface as ProductFieldNameInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface as WarehouseFieldNameInterface;
use App\Entity\StockItem\Route\NameProvider as RouteNameProvider;
use App\Entity\Base\Layouts\ListLayout as BaseListLayout;
use Orchid\Screen\TD;

class StockItemListLayout extends ListLayout
{
    const DATA_KEY = 'stock_items';

    public function __construct(RouteNameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        $editRouteName = $this->routeNameProvider->getEdit();

        return [
            TD::set(FieldNameInterface::ID, LabelInterface::ID)
                ->link($editRouteName, FieldNameInterface::ID, FieldNameInterface::ID),

            TD::set(FieldNameInterface::PRODUCT_ID, LabelInterface::PRODUCT_ID),
            TD::set(FieldNameInterface::PRODUCT . '.' . ProductFieldNameInterface::NAME, LabelInterface::PRODUCT_NAME),

            TD::set(FieldNameInterface::WAREHOUSE_ID, LabelInterface::WAREHOUSE_ID),
            TD::set(FieldNameInterface::WAREHOUSE . '.' . WarehouseFieldNameInterface::CODE, LabelInterface::WAREHOUSE_CODE),
            TD::set(FieldNameInterface::QUANTITY, LabelInterface::QUANTITY)
                ->link($editRouteName, FieldNameInterface::ID, FieldNameInterface::QUANTITY),

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
