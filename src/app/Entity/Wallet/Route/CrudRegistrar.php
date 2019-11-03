<?php

namespace App\Entity\Wallet\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\Wallet\Route\NameProvider as RouteNameProvider;
use App\Entity\Wallet\Route\PathProvider as RoutePathProvider;
use App\Common\Route\RouteRegistrarHelper;
use App\Entity\Wallet\Screens\EditScreen as EditScreen;
use App\Entity\Wallet\Screens\ModelBasedListScreen;

class CrudRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegistrarHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    ) {
        $listScreenClassName = ModelBasedListScreen::class;
        $editScreenClassName = EditOrCreateScreen::class;

        parent::__construct(
            $routeRegisterHelper,
            $nameProvider,
            $pathProvider,
            $listScreenClassName,
            $editScreenClassName
        );
    }
}
