<?php

namespace App\Common\Route;

use App\Contract\Entity\Base\Route\RegistrarInterface as RouteRegistrarInterface;
use App\DataProvider\Entity\Names\EnabledNamesProvider as EnabledEntityNamesProvider;
use App\EntityMeta\DataProvider\ByName\Route\Registrar\InstanceProvider as  RouteRegistrarProvider;
use Illuminate\Routing\Router;

class CrmRoutesRegistrar
{
    /** @var EnabledEntityNamesProvider */
    private $enabledEntityNamesProvider;

    /** @var RouteRegistrarProvider */
    private $routeRegistrarProvider;

    public function __construct(
        EnabledEntityNamesProvider $enabledEntityNamesProvider,
        RouteRegistrarProvider $routeRegistrarProvider
    )
    {
        $this->enabledEntityNamesProvider = $enabledEntityNamesProvider;
        $this->routeRegistrarProvider = $routeRegistrarProvider;
    }

    public function registerRoutes(Router $router)
    {
        $crmEntitiesRoutesRegistrars = $this->getCrmEntitiesRoutesRegistrars();

        $this->applyRouteRegistrars($router, $crmEntitiesRoutesRegistrars);
    }

    /**
     * @return RouteRegistrarInterface[]
     */
    private function getCrmEntitiesRoutesRegistrars(): array
    {
        $crmEntitiesNames = $this->getCrmEntitiesNames();

        return $this->getCrmEntitiesRoutesRegistrarsByNames($crmEntitiesNames);
    }

    private function getCrmEntitiesNames(): array
    {
        return $this->enabledEntityNamesProvider->getEnabledEntitiesNames();
    }

    private function getCrmEntitiesRoutesRegistrarsByNames($crmEntitiesNames)
    {
        $routeRegistrars = [];

        foreach ($crmEntitiesNames as $crmEntityName) {
            $routeRegistrars[$crmEntityName] = $this->getRouteRegistrarByEntityName($crmEntityName);
        }

        return $routeRegistrars;
    }

    private function getRouteRegistrarByEntityName(string $entityName): RouteRegistrarInterface
    {
        return $this->routeRegistrarProvider->getTypedValueByKey($entityName);
    }

    private function applyRouteRegistrars(Router $router, $routeRegistrars)
    {
        foreach ($routeRegistrars as $routeRegistrar) {
            $this->applyRouteRegistrar($router, $routeRegistrar);
        }
    }

    private function applyRouteRegistrar(Router $router, RouteRegistrarInterface $routeRegistrar)
    {
        $routeRegistrar->registerRoutes($router);
    }
}
