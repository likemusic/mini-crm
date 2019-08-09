<?php

namespace App\Orchid\Screens\Product;

use App\Entity\Product\Route\NameProvider as ProductRouteNameProvider;
use App\Entity\Product\UseVariantProvider as ProductUseVariant;
use App\Model\Product;
use App\Orchid\Layouts\Product\ProductListLayout;
use App\Orchid\Screens\Base\ListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    public function __construct(
        Product $model,
        ProductUseVariant $useVariant,
        ProductRouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return 'products';
    }

    protected function getLayoutClassName(): string
    {
        return ProductListLayout::class;
    }
}
