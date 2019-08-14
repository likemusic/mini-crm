<?php

namespace App\Orchid\Screens\OrderItem;

use App\Entity\OrderItem\Route\NameProvider as RouteNameProvider;
use App\Entity\OrderItem\UseVariantProvider;
use App\Model\OrderItem;
use App\Orchid\Layouts\OrderItem\OrderItemListLayout;
use App\Orchid\Screens\Base\ListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    public function __construct(
        OrderItem $model,
        UseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return 'order-items';
    }

    protected function getLayoutClassName(): string
    {
        return OrderItemListLayout::class;
    }
}
