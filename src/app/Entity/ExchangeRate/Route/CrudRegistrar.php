<?php

namespace App\Entity\ExchangeRate\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\ExchangeRate\Route\NameProvider as RouteNameProvider;
use App\Entity\ExchangeRate\Route\PathProvider as RoutePathProvider;
use App\Common\Route\RouteRegistrarHelper;
use App\Entity\ExchangeRate\Screens\EditScreen as EditScreen;
use App\Entity\ExchangeRate\Screens\ModelBasedListScreen;

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
