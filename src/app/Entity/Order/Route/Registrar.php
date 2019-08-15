<?php

namespace App\Entity\Order\Route;

use App\Entity\Base\Route\Registrar as BaseRegistrar;
use App\Entity\Order\Route\NameProvider as RouteNameProvider;
use App\Entity\Order\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\Order\EditScreen as EditScreen;
use App\Orchid\Screens\Order\ListScreen as ListScreen;

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
