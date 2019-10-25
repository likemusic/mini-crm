<?php

namespace App\Entity\ProductCategory\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\ProductCategory\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductCategory\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\ProductCategory\Edit\Create as CreateScreen;
use App\Orchid\Screens\ProductCategory\Edit\Update as UpdateScreen;
use App\Orchid\Screens\ProductCategory\ListScreen as ListScreen;

class CrudRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    ) {
        $listScreenClassName = ListScreen::class;
        $createScreenClassName = CreateScreen::class;
        $updateScreenClassName = UpdateScreen::class;

        parent::__construct(
            $routeRegisterHelper,
            $nameProvider,
            $pathProvider,
            $listScreenClassName,
            $createScreenClassName,
            $updateScreenClassName
        );
    }
}
