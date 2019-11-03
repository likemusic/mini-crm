<?php

namespace App\Entity\Base\Route\Registrar;

use App\Common\Route\RouteRegistrarHelper;
use App\Contract\Entity\Base\Route\NameProviderInterface;
use App\Contract\Entity\Base\Route\PathProviderInterface;
use Illuminate\Contracts\Routing\Registrar as RoutingRegistrarInterface;
use App\Contract\Entity\Base\Route\RegistrarInterface;

class ListEditRegistrar implements RegistrarInterface
{
    /**
     * @var NameProviderInterface
     */
    private $routeRegisterHelper;

    /**
     * @var NameProviderInterface
     */
    private $nameProvider;

    /**
     * @var PathProviderInterface
     */
    private $pathProvider;

    /**
     * @var string
     */
    private $listScreenClassName;

    /**
     * @var string
     */
    private $updateScreenClassName;

    /**
     * Registrar constructor.
     * @param RouteRegistrarHelper $routeRegisterHelper
     * @param NameProviderInterface $nameProvider
     * @param PathProviderInterface $pathProvider
     * @param string $listScreenClassName
     * @param string $updateScreenClassName
     */
    public function __construct(
        RouteRegistrarHelper $routeRegisterHelper,
        NameProviderInterface $nameProvider,
        PathProviderInterface $pathProvider,
        string $listScreenClassName,
        string $updateScreenClassName
    )
    {
        $this->routeRegisterHelper = $routeRegisterHelper;
        $this->nameProvider = $nameProvider;
        $this->pathProvider = $pathProvider;
        $this->listScreenClassName = $listScreenClassName;
        $this->updateScreenClassName = $updateScreenClassName;
    }

    /**
     * @param RoutingRegistrarInterface $router
     */
    public function registerRoutes(RoutingRegistrarInterface $router)
    {
        $pathProvider = $this->pathProvider;
        $nameProvider = $this->nameProvider;

        $this->addEditRoute(
            $router,
            $pathProvider,
            $nameProvider,
            $this->updateScreenClassName
        );

        $this->addListRoute(
            $router,
            $pathProvider,
            $nameProvider,
            $this->listScreenClassName
        );
    }

    private function addEditRoute(
        RoutingRegistrarInterface $router,
        PathProviderInterface $pathProvider,
        NameProviderInterface $nameProvider,
        string $editScreenClassName
    )
    {
        $this->routeRegisterHelper->addEditRoute(
            $router,
            $pathProvider,
            $nameProvider,
            $editScreenClassName
        );
    }

    private function addListRoute(
        RoutingRegistrarInterface $router,
        PathProviderInterface $pathProvider,
        NameProviderInterface $nameProvider,
        string $listScreenClassName
    )
    {
        $this->routeRegisterHelper->addListRoute(
            $router,
            $pathProvider,
            $nameProvider,
            $listScreenClassName
        );
    }
}
