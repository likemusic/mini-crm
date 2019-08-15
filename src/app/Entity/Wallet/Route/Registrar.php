<?php

namespace App\Entity\Wallet\Route;

use App\Entity\Base\Route\Registrar as BaseRegistrar;
use App\Entity\Wallet\Route\NameProvider as RouteNameProvider;
use App\Entity\Wallet\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\Wallet\EditScreen as EditScreen;
use App\Orchid\Screens\Wallet\ListScreen as ListScreen;

class Registrar extends BaseRegistrar
{
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    ) {
        $listScreenClassName = ListScreen::class;
        $editScreenClassName = EditScreen::class;

        parent::__construct(
            $routeRegisterHelper,
            $nameProvider,
            $pathProvider,
            $listScreenClassName,
            $editScreenClassName
        );
    }
}
