<?php

namespace App\Entity\StockItem\Screens;

use App\Entity\StockItem\Route\NameProvider as RouteNameProvider;
use App\Entity\StockItem\CrudUseVariantProvider;
use App\Entity\StockItem\StockItem;
use App\Entity\StockItem\Layouts\StockItemListLayout;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        StockItem $model,
        CrudUseVariantProvider $useVariant,
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
