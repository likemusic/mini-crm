<?php

namespace App\Entity\User\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\User\Route\NameProvider as RouteNameProvider;
use App\Entity\User\Route\PathProvider as RoutePathProvider;
use App\Common\Route\RouteRegistrarHelper;
use App\Entity\User\HttpControllers\Delete as DeleteController;
//use App\Orchid\Screens\User\Edit\Create as CreateScreen;
use App\Entity\User\Screens\UserEditScreen as CreateScreen;
//use App\Orchid\Screens\User\EditScreen as EditScreen;
use App\Entity\User\Screens\UserEditScreen as UpdateScreen;
//use App\Orchid\Screens\User\ListScreen;
use App\Entity\User\Screens\UserListScreen as ListScreen;

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
