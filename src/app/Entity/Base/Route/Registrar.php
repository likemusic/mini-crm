<?php

namespace App\Entity\Base\Route;

use App\Contract\Entity\Base\Route\NameProviderInterface;
use App\Contract\Entity\Base\Route\PathProviderInterface;
use App\Contract\Entity\Base\Route\RegistrarInterface;
use App\Helper\RouteRegisterHelper;
use Illuminate\Contracts\Routing\Registrar as RoutingRegistrarInterface;

class Registrar implements RegistrarInterface
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
    private $editScreenClassName;

    /**
     * Registrar constructor.
     * @param RouteRegisterHelper $routeRegisterHelper
     * @param NameProviderInterface $nameProvider
     * @param PathProviderInterface $pathProvider
     * @param string $listScreenClassName
     * @param string $editScreenClassName
     */
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
        NameProviderInterface $nameProvider,
        PathProviderInterface $pathProvider,
        string $listScreenClassName,
        string $editScreenClassName
    ) {
        $this->routeRegisterHelper = $routeRegisterHelper;
        $this->nameProvider = $nameProvider;
        $this->pathProvider = $pathProvider;
        $this->listScreenClassName = $listScreenClassName;
        $this->editScreenClassName = $editScreenClassName;
    }

    /**
     * @param RoutingRegistrarInterface $router
     */
    public function registerRoutes(RoutingRegistrarInterface $router)
    {
        $this->routeRegisterHelper->addRoutes(
            $router,
            $this->pathProvider,
            $this->nameProvider,
            $this->listScreenClassName,
            $this->editScreenClassName
        );
    }
}
