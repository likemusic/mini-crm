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
        string $createScreenClassName,
        string $updateScreenClassName
    ) {
        $router
            ->screen($pathProvider->getCreate(), $createScreenClassName)
            ->name($nameProvider->getCreate());

        $router
            ->screen($pathProvider->getUpdate(), $updateScreenClassName)
            ->name($nameProvider->getUpdate());

        $this->addListRoutes($router, $pathProvider, $nameProvider, $listScreenClassName, $createScreenClassName);
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
