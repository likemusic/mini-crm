<?php

namespace App\Orchid\Screens\Product;

use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Entity\Product\UseVariantProvider;
use App\Model\Product;
use App\Orchid\Layouts\Product\ProductListLayout;
use App\Orchid\Screens\Base\ListScreen as BaseListScreen;
use Illuminate\Http\Request;
use Psr\Container\ContainerInterface;

class ListScreen extends BaseListScreen
{
    public function __construct(
        ContainerInterface $container,
        Product $model,
        UseVariantProvider $useVariant,
        RouteNameProvider $routeNameProvider,
        ?Request $request = null
    ) {
        parent::__construct($container, $model, $useVariant, $routeNameProvider, $request);
    }

    protected function getDataKey(): string
    {
        return ProductListLayout::DATA_KEY;
    }

    protected function getLayoutClassName(): string
    {
        return ProductListLayout::class;
    }
}
