<?php

namespace App\Orchid\Screens\UnaccountedProduct;

use App\Entity\UnaccountedProduct\Route\NameProvider as ProductRouteNameProvider;
use App\Entity\UnaccountedProduct\UseVariantProvider as ProductUseVariant;
use App\Model\UnaccountedProduct;
use App\Orchid\Layouts\UnaccountedProduct\UnaccountedProductListLayout;
use App\Orchid\Screens\Base\ListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ListScreen extends BaseListScreen
{
    public function __construct(
        UnaccountedProduct $model,
        ProductUseVariant $useVariant,
        ProductRouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return 'unaccounted-products';
    }

    protected function getLayoutClassName(): string
    {
        return UnaccountedProductListLayout::class;
    }
}
