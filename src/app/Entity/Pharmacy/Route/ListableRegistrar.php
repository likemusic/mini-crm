<?php

namespace App\Entity\Pharmacy\Route;

use App\Entity\Base\Route\Registrar\ListableRegistrar as BaseRegistrar;
use App\Entity\Pharmacy\Route\NameProvider as RouteNameProvider;
use App\Entity\Pharmacy\Route\PathProvider as RoutePathProvider;
use App\Common\RouteRegistrarHelper;
use App\Entity\Pharmacy\Screens\ModelBasedListScreen;

class ListableRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegistrarHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    )
    {
        $listScreenClassName = ModelBasedListScreen::class;

        parent::__construct(
            $routeRegisterHelper,
            $nameProvider,
            $pathProvider,
            $listScreenClassName
        );
    }
}
