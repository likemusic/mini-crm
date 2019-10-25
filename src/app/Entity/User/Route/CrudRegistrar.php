<?php

namespace App\Entity\User\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\User\Route\NameProvider as RouteNameProvider;
use App\Entity\User\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;

//use App\Orchid\Screens\User\EditScreen as EditScreen;

//use App\Orchid\Screens\User\EditScreen as EditScreen;
use App\Orchid\Screens\User\UserEditScreen as EditScreen;

//use App\Orchid\Screens\User\ModelBasedListScreen;
use App\Orchid\Screens\User\UserListScreen as ListScreen;

class CrudRegistrar extends BaseRegistrar
{
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
        RouteNameProvider $nameProvider,
        RoutePathProvider $pathProvider
    ) {
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
