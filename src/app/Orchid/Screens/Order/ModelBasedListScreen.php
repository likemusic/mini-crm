<?php

namespace App\Orchid\Screens\Order;

use App\Entity\Order\Route\NameProvider as RouteNameProvider;
use App\Entity\Order\CrudUseVariantProvider;
use App\Model\Order;
use App\Entity\Order\Layouts\OrderListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        Order $model,
        CrudUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return OrderListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return OrderListLayout::class;
    }
}
