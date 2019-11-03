<?php

namespace App\Entity\Role\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\Role\Route\NameProvider as RouteNameProvider;
use App\Entity\Role\Route\PathProvider as RoutePathProvider;
use App\Common\Route\RouteRegistrarHelper;
use App\Entity\Role\HttpControllers\Delete as DeleteController;
//use App\Orchid\Screens\Role\Edit\Create as CreateScreen;
//use App\Orchid\Screens\Role\Edit\Update as UpdateScreen;
use App\Entity\Role\Screens\RoleEditScreen as CreateScreen;
use App\Entity\Role\Screens\RoleEditScreen as UpdateScreen;
use App\Entity\Role\Screens\ListScreen;

class CrudRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegistrarHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    )
    {
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
