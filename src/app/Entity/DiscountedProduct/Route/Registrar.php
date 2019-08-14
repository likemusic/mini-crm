<?php

namespace App\Entity\DiscountedProduct\Route;

use App\Entity\Base\Route\Registrar as BaseRegistrar;
use App\Entity\DiscountedProduct\Route\NameProvider as RouteNameProvider;
use App\Entity\DiscountedProduct\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\DiscountedProduct\EditScreen as EditScreen;
use App\Orchid\Screens\DiscountedProduct\ListScreen as ListScreen;

class Registrar extends BaseRegistrar
{
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    ) {
        $listScreenClassName = ListScreen::class;
        $editScreenClassName = EditScreen::class;

        parent::__construct(
            $routeRegisterHelper,
            $nameProvider,
            $pathProvider,
            $listScreenClassName,
            $editScreenClassName
        );
    }
}
