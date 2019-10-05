<?php

namespace App\Entity\ProductCategory\Route;

use App\Entity\Base\Route\Registrar\EditableRegistrar as BaseRegistrar;
use App\Entity\ProductCategory\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductCategory\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\ProductCategory\EditScreen as EditScreen;
use App\Orchid\Screens\ProductCategory\ModelBasedListScreen;

class EditableRegistrar extends BaseRegistrar
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
