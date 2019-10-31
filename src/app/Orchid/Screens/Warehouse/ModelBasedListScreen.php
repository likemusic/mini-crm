<?php

namespace App\Orchid\Screens\Warehouse;

use App\Entity\Warehouse\Route\NameProvider as RouteNameProvider;
use App\Entity\Warehouse\CrudUseVariantProvider as EditableUseVariantProvider;
use App\Model\Warehouse;
use App\Entity\Warehouse\Layouts\WarehouseListLayout;
use App\Entity\Base\Screens\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        Warehouse $model,
        CrudUseVariantProvider $useVariant,
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
