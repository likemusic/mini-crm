<?php

namespace App\Entity\Product\Route;

use App\Entity\Base\Route\Registrar as BaseRegistrar;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Entity\Product\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\Product\EditScreen as EditScreen;
use App\Orchid\Screens\Product\ListScreen as ListScreen;

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
