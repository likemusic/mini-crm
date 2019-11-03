<?php

namespace App\DataProvider\Entity;

use App\Contract\Entity\Base\Route\RegistrarInterface as RouteRegistrarInterface;
use Illuminate\Contracts\Container\Container;

class RouteRegistrarProvider
{
    /** @var RouteRegistrarClassNameProvider */
    private $registrarClassNameProvider;

    /** @var Container */
    private $container;

    public function __construct(
        RouteRegistrarClassNameProvider $registrarClassNameProvider,
        Container $container
    )
    {
        $this->registrarClassNameProvider = $registrarClassNameProvider;
        $this->container = $container;
    }

    public function getRouteRegistrarByEntityName(string $entityName): RouteRegistrarInterface
    {
        $routeRegistrarClassName = $this->getRouteRegistrarClassNameByEntityName($entityName);

        return $this->getInstance($routeRegistrarClassName);
    }

    private function getRouteRegistrarClassNameByEntityName(string $entityName): string
    {
        return $this->registrarClassNameProvider->getRouteRegistrarClassNameProviderByEntityName($entityName);
    }

    private function getInstance($className)
    {
        return $this->container->get($className);
    }
}
