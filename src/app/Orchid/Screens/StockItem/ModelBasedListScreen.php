<?php

namespace App\Orchid\Screens\StockItem;

use App\Entity\StockItem\Route\NameProvider as RouteNameProvider;
use App\Entity\StockItem\EditableUseVariantProvider;
use App\Model\StockItem;
use App\Orchid\Layouts\StockItem\StockItemListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBasedListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        StockItem $model,
        EditableUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return StockItemListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return StockItemListLayout::class;
    }
}