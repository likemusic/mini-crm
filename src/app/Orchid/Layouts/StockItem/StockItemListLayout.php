<?php

namespace App\Orchid\Layouts\StockItem;

use App\Contract\Entity\StockItem\Field\LabelInterface;
use App\Contract\Entity\StockItem\Field\NameInterface as FieldNameInterface;
use App\Entity\StockItem\Route\NameProvider as RouteNameProvider;
use App\Orchid\Layouts\Base\ListLayout;
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
        return [
            TD::set(FieldNameInterface::ID, LabelInterface::ID),
            TD::set(FieldNameInterface::PRODUCT_ID, LabelInterface::PRODUCT_ID),
            TD::set(FieldNameInterface::WAREHOUSE_ID, LabelInterface::WAREHOUSE_ID),
            TD::set(FieldNameInterface::QUANTITY, LabelInterface::QUANTITY),

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
