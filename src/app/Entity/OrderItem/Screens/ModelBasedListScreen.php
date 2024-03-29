<?php

namespace App\Entity\OrderItem\Screens;

use App\Entity\OrderItem\Route\NameProvider as RouteNameProvider;
use App\Entity\OrderItem\CrudUseVariantProvider;
use App\Entity\OrderItem\OrderItem;
use App\Entity\OrderItem\Layouts\OrderItemListLayout;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
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
