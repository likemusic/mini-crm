<?php

namespace App\Orchid\Screens\Warehouse;

use App\Entity\Warehouse\Route\NameProvider as RouteNameProvider;
use App\Entity\Warehouse\EditableUseVariantProvider as EditableUseVariantProvider;
use App\Model\Warehouse;
use App\Orchid\Layouts\Warehouse\WarehouseListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBasedListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        Warehouse $model,
        EditableUseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return WarehouseListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return WarehouseListLayout::class;
    }
}
