<?php

namespace App\Entity\Settings\Route;

use App\Common\Route\RouteRegistrarHelper;
use App\Entity\Base\Route\Registrar\ListEditRegistrar as BaseRegistrar;
use App\Entity\Settings\Route\NameProvider as RouteNameProvider;
use App\Entity\Settings\Route\PathProvider as RoutePathProvider;
use App\Entity\Settings\Screens\Edit\Update as UpdateScreen;
use App\Entity\Settings\Screens\ListScreen;

class ListEditRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegistrarHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    )
    {
        $listScreenClassName = ListScreen::class;
        $updateScreenClassName = UpdateScreen::class;

        parent::__construct(
            $routeRegisterHelper,
            $nameProvider,
            $pathProvider,
            $listScreenClassName,
            $updateScreenClassName
        );
    }
}
