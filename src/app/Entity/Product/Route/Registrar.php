<?php

namespace App\Entity\Product\Route;

use App\Entity\Base\Route\Registrar as BaseRegistrar;
use App\Entity\Product\Route\NameProvider as ProductRouteNameProvider;
use App\Entity\Product\Route\PathProvider as ProductRoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\Product\EditScreen as ProductEditScreen;
use App\Orchid\Screens\Product\ListScreen as ProductListScreen;

class Registrar extends BaseRegistrar
{
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
        ProductRouteNameProvider $nameProvider,
        ProductRoutePathProvider $pathProvider
    ) {
        $listScreenClassName = ProductListScreen::class;
        $editScreenClassName = ProductEditScreen::class;

        parent::__construct(
            $routeRegisterHelper,
            $nameProvider,
            $pathProvider,
            $listScreenClassName,
            $editScreenClassName
        );
    }
}
