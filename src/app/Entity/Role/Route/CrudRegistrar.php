<?php

namespace App\Entity\Role\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\Role\Route\NameProvider as RouteNameProvider;
use App\Entity\Role\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\Role\RoleEditScreen as EditScreen;
use App\Orchid\Screens\Role\RoleListScreen as ListScreen;

//use App\Orchid\Screens\Role\EditScreen as EditScreen;
//use App\Orchid\Screens\Role\ModelBasedListScreen;

class CrudRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    )
    {
        $listScreenClassName = ListScreen::class;
        $updateScreenClassName = EditScreen::class;
        $createScreenClassName = EditScreen::class;

        parent::__construct(
            $routeRegisterHelper,
            $nameProvider,
            $pathProvider,
            $listScreenClassName,
            $createScreenClassName,
            $updateScreenClassName
        );
    }
}
