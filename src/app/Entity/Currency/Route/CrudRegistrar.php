<?php

namespace App\Entity\Currency\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\Currency\Route\NameProvider as RouteNameProvider;
use App\Entity\Currency\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Http\Controllers\Entity\Currency\Delete as DeleteController;
use App\Orchid\Screens\Currency\Edit\Create as CreateScreen;
use App\Orchid\Screens\Currency\Edit\Update as UpdateScreen;
use App\Orchid\Screens\Currency\ListScreen;

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
