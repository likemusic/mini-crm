<?php

namespace App\Entity\ProductQuote\Route;

use App\Entity\Base\Route\Registrar\CrudRegistrar as BaseRegistrar;
use App\Entity\ProductQuote\Route\NameProvider as RouteNameProvider;
use App\Entity\ProductQuote\Route\PathProvider as RoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Entity\ProductQuote\Screens\EditScreen as EditScreen;
use App\Entity\ProductQuote\Screens\ModelBasedListScreen;

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
