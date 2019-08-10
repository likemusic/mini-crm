<?php

namespace App\Entity\Warehouse\Route;

use App\Entity\Base\Route\Registrar as BaseRegistrar;
use App\Entity\Warehouse\Route\NameProvider as WarehouseRouteNameProvider;
use App\Entity\Warehouse\Route\PathProvider as WarehouseRoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\Warehouse\EditScreen as WarehouseEditScreen;
use App\Orchid\Screens\Warehouse\ListScreen as WarehouseListScreen;

class Registrar extends BaseRegistrar
{
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
        WarehouseRouteNameProvider $nameProvider,
        WarehouseRoutePathProvider $pathProvider
    ) {
        $listScreenClassName = WarehouseListScreen::class;
        $editScreenClassName = WarehouseEditScreen::class;

        parent::__construct(
            $routeRegisterHelper,
            $nameProvider,
            $pathProvider,
            $listScreenClassName,
            $editScreenClassName
        );
    }
}
