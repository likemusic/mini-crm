<?php

namespace App\Entity\ProductCategory\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\ProductCategory\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductCategory\Route\PathProvider as RoutePathProvider;
use App\Common\RouteRegistrarHelper;
use App\Entity\ProductCategory\HttpControllers\Delete as DeleteController;
use App\Entity\ProductCategory\Screens\Edit\Create as CreateScreen;
use App\Entity\ProductCategory\Screens\Edit\Update as UpdateScreen;
use App\Entity\ProductCategory\Screens\ListScreen as ListScreen;

class CrudRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegistrarHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    ) {
        $listScreenClassName = ListScreen::class;
        $createScreenClassName = CreateScreen::class;
        $updateScreenClassName = UpdateScreen::class;
        $deleteControllerClassName = DeleteController::class;

        parent::__construct(
            $routeRegisterHelper,
            $nameProvider,
            $pathProvider,
            $listScreenClassName,
            $createScreenClassName,
            $updateScreenClassName,
            $deleteControllerClassName
        );
    }
}
