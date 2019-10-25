<?php

namespace App\Orchid\Screens\OrderItem;

use App\Entity\OrderItem\Route\NameProvider as RouteNameProvider;
use App\Entity\OrderItem\CrudUseVariantProvider;
use App\Model\OrderItem;
use App\Orchid\Layouts\OrderItem\OrderItemListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        OrderItem $model,
        CrudUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return OrderItemListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return OrderItemListLayout::class;
    }
}
