<?php

namespace App\Entity\Currency\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\Currency\Route\NameProvider as RouteNameProvider;
use App\Entity\Currency\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\Currency\EditScreen as EditScreen;
use App\Orchid\Screens\Currency\ModelBasedListScreen;

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
