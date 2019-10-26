<?php

namespace App\Entity\Role\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\Role\Route\NameProvider as RouteNameProvider;
use App\Entity\Role\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Http\Controllers\Entity\Role\Delete as DeleteController;
//use App\Orchid\Screens\Role\Edit\Create as CreateScreen;
//use App\Orchid\Screens\Role\Edit\Update as UpdateScreen;
use App\Orchid\Screens\Role\RoleEditScreen as CreateScreen;
use App\Orchid\Screens\Role\RoleEditScreen as UpdateScreen;
use App\Orchid\Screens\Role\ListScreen;

class CrudRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
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
