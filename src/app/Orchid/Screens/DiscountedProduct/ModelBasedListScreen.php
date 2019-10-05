<?php

namespace App\Orchid\Screens\DiscountedProduct;

use App\Entity\DiscountedProduct\Route\NameProvider as ProductRouteNameProvider;
use App\Entity\DiscountedProduct\EditableUseVariantProvider as ProductUseVariant;
use App\Model\DiscountedProduct;
use App\Orchid\Layouts\DiscountedProduct\DiscountedProductListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBasedListScreen as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
{
    public function __construct(
        DiscountedProduct $model,
        ProductUseVariant $useVariant,
        ProductRouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return DiscountedProductListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return DiscountedProductListLayout::class;
    }
}