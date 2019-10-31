<?php

namespace App\Entity\StockItem\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\StockItem\Route\NameProvider as RouteNameProvider;
use App\Entity\StockItem\Route\PathProvider as RoutePathProvider;
use App\Common\RouteRegistrarHelper;
use App\Entity\StockItem\Screens\EditScreen as EditScreen;
use App\Entity\StockItem\Screens\ModelBasedListScreen;

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
