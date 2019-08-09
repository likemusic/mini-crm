<?php

namespace App\Orchid\Screens\Warehouse;

use App\Entity\Warehouse\UseVariantProvider as WarehouseUseVariant;
use App\Model\Warehouse;
use App\Orchid\Layouts\Product\ProductListLayout;
use App\Orchid\Screens\Base\ListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    public function __construct(Warehouse $model, WarehouseUseVariant $useVariant, ?Request $request = null)
    {
        parent::__construct($model, $useVariant, $request);
    }

    protected function getDataKey()
    {
        return 'warehouses';
    }

    protected function getLayoutClassName()
    {
        return ProductListLayout::class;
    }
}
