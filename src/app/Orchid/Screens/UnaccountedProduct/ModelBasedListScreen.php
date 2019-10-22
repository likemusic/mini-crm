<?php

namespace App\Orchid\Screens\UnaccountedProduct;

use App\Entity\UnaccountedProduct\Route\NameProvider as ProductRouteNameProvider;
use App\Entity\UnaccountedProduct\EditableUseVariantProvider as ProductUseVariant;
use App\Model\UnaccountedProduct;
use App\Orchid\Layouts\UnaccountedProduct\UnaccountedProductListLayout;
use App\Orchid\Screens\Base\ListScreen\ModelBased as BaseListScreen;
use Illuminate\Http\Request;

class ModelBasedListScreen extends BaseListScreen
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
        return UnaccountedProductListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return UnaccountedProductListLayout::class;
    }
}
