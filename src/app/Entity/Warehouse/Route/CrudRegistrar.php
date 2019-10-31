<?php

namespace App\Entity\Warehouse\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\Warehouse\Route\NameProvider as RouteNameProvider;
use App\Entity\Warehouse\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Entity\Warehouse\Screens\EditScreen as EditScreen;
use App\Entity\Warehouse\Screens\ModelBasedListScreen;

class CrudRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
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
