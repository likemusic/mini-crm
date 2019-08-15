<?php

namespace App\Orchid\Screens\Order;

use App\Entity\Order\Route\NameProvider as RouteNameProvider;
use App\Entity\Order\UseVariantProvider;
use App\Model\Order;
use App\Orchid\Layouts\Order\OrderListLayout;
use App\Orchid\Screens\Base\ListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    public function __construct(
        Order $model,
        UseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return 'orders';
    }

    protected function getLayoutClassName(): string
    {
        return OrderListLayout::class;
    }
}
