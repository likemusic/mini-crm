<?php

namespace App\Helper;

use App\Contract\Entity\Base\Route\NameProviderInterface;
use App\Contract\Entity\Base\Route\PathProviderInterface;
use Illuminate\Contracts\Routing\Registrar;

class RouteRegisterHelper
{
    public function addRoutes(
        Registrar $router,
        PathProviderInterface $pathProvider,
        NameProviderInterface $nameProvider,
        string $listScreenClassName,
        string $editScreenClassName
    ) {
        $router
            ->screen($pathProvider->getNew(), $editScreenClassName)
            ->name($nameProvider->getNew());

        $router
            ->screen($pathProvider->getEdit(), $editScreenClassName)
            ->name($nameProvider->getEdit());

        $router
            ->screen($pathProvider->getList(), $listScreenClassName)
            ->name($nameProvider->getList());
    }
}
