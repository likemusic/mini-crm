<?php

namespace App\Orchid\Screens\Warehouse;

use App\Entity\Warehouse\Route\NameProvider as WarehouseRouteNameProvider;
use App\Entity\Warehouse\UseVariantProvider as WarehouseUseVariant;
use App\Model\Warehouse;
use App\Orchid\Layouts\Warehouse\WarehouseListLayout;
use App\Orchid\Screens\Base\ListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    public function __construct(
        Warehouse $model,
        WarehouseUseVariant $useVariant,
        WarehouseRouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return 'warehouses';
    }

    protected function getLayoutClassName(): string
    {
        return WarehouseListLayout::class;
    }
}
