<?php

namespace App\Entity\Product\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
use App\Entity\Product\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\Product\Edit\Create as CreateScreen;
use App\Orchid\Screens\Product\Edit\Update as UpdateScreen;
use App\Orchid\Screens\Product\ListScreen;
use App\Http\Controllers\DeleteEntity\Base as DeleteController;

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
