<?php

namespace App\Helper;

use App\Contract\Entity\Base\Route\NameProviderInterface;
use App\Contract\Entity\Base\Route\PathProviderInterface;
use Illuminate\Contracts\Routing\Registrar;

class RouteRegisterHelper
{
    public function addCrudRoutes(
        Registrar $router,
        PathProviderInterface $pathProvider,
        NameProviderInterface $nameProvider,
        string $listScreenClassName,
        string $createScreenClassName,
        string $updateScreenClassName,
        string $deleteControllerClassName
    )
    {
        $this->addCreateRoute($router, $pathProvider, $nameProvider, $createScreenClassName);
        $this->addEditRoute($router, $pathProvider, $nameProvider, $updateScreenClassName);
        $this->addDeleteRoute($router, $pathProvider, $nameProvider, $deleteControllerClassName);
        $this->addListRoute($router, $pathProvider, $nameProvider, $listScreenClassName);
    }

    public function addCreateRoute(
        Registrar $router,
        PathProviderInterface $pathProvider,
        NameProviderInterface $nameProvider,
        string $createScreenClassName
    )
    {
        $routePath = $pathProvider->getCreate();
        $routeName = $nameProvider->getCreate();
        $screenClassName = $createScreenClassName;

        $this->registerScreen($router, $routePath, $routeName, $screenClassName);
    }

    private function registerScreen(
        Registrar $router,
        string $routePath,
        string $routeName,
        string $screenClassName)
    {
        $router
            ->screen($routePath, $screenClassName)
            ->name($routeName);
    }

    public function addEditRoute(
        Registrar $router,
        PathProviderInterface $pathProvider,
        NameProviderInterface $nameProvider,
        string $editScreenClassName
    )
    {
        $router
            ->screen($pathProvider->getEdit(), $editScreenClassName)
            ->name($nameProvider->getEdit());
    }

    public function addDeleteRoute(
        Registrar $router,
        PathProviderInterface $pathProvider,
        NameProviderInterface $nameProvider,
        string $deleteControllerClassName
    )
    {
        $routePath = $pathProvider->getDelete();
        $routeName = $nameProvider->getDelete();
        $controllerClassName = $deleteControllerClassName;

        $this->registerPostController($router, $routePath, $routeName, $controllerClassName);
    }

    private function registerPostController($router, $routePath, $routeName, $controllerClassName)
    {
        $router
            ->get($routePath, $controllerClassName)
            ->name($routeName);
    }

    public function addListRoute(
        Registrar $router,
        PathProviderInterface $pathProvider,
        NameProviderInterface $nameProvider,
        string $listScreenClassName
    )
    {

        $routePath = $pathProvider->getList();
        $routeName = $nameProvider->getList();
        $screenClassName = $listScreenClassName;

        $this->registerScreen($router, $routePath, $routeName, $screenClassName);
    }
}
