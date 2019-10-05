<?php

namespace App\Helper;

use App\Contract\Entity\Base\Route\NameProviderInterface;
use App\Contract\Entity\Base\Route\PathProviderInterface;
use Illuminate\Contracts\Routing\Registrar;

class RouteRegisterHelper
{
    public function addEditableRoutes(
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

        $this->addListRoutes($router, $pathProvider, $nameProvider, $listScreenClassName, $editScreenClassName);
    }

    public function addListRoutes(
        Registrar $router,
        PathProviderInterface $pathProvider,
        NameProviderInterface $nameProvider,
        string $listScreenClassName
    )
    {
        $router
            ->screen($pathProvider->getList(), $listScreenClassName)
            ->name($nameProvider->getList());
    }
}
