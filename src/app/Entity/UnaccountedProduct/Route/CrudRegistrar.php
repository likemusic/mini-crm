<?php

namespace App\Entity\UnaccountedProduct\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\UnaccountedProduct\Route\NameProvider as RouteNameProvider;
use App\Entity\UnaccountedProduct\Route\PathProvider as RoutePathProvider;
use App\Common\RouteRegistrarHelper;
use App\Entity\UnaccountedProduct\Screens\EditScreen as EditScreen;
use App\Entity\UnaccountedProduct\Screens\ModelBasedListScreen;

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
