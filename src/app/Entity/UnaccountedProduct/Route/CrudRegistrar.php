<?php

namespace App\Entity\UnaccountedProduct\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\UnaccountedProduct\Route\NameProvider as RouteNameProvider;
use App\Entity\UnaccountedProduct\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\UnaccountedProduct\EditScreen as EditScreen;
use App\Orchid\Screens\UnaccountedProduct\ModelBasedListScreen;

class CrudRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    ) {
        $listScreenClassName = ModelBasedListScreen::class;
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
