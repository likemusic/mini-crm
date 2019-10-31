<?php

namespace App\Entity\Base\Route\Registrar;

use App\Contract\Entity\Base\Route\NameProviderInterface;
use App\Contract\Entity\Base\Route\PathProviderInterface;
use App\Contract\Entity\Base\Route\RegistrarInterface;
use App\Common\RouteRegistrarHelper;
use Illuminate\Contracts\Routing\Registrar as RoutingRegistrarInterface;

class CrudRegistrar implements RegistrarInterface
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
    private $createScreenClassName;

    /**
     * @var string
     */
    private $updateScreenClassName;

    /**
     * @var string
     */
    private $deleteControllerClassName;

    /**
     * Registrar constructor.
     * @param RouteRegistrarHelper $routeRegisterHelper
     * @param NameProviderInterface $nameProvider
     * @param PathProviderInterface $pathProvider
     * @param string $listScreenClassName
     * @param string $editScreenClassName
     * @param string $updateScreenClassName
     * @param string $deleteControllerClassName
     */
    public function __construct(
        RouteRegistrarHelper $routeRegisterHelper,
        NameProviderInterface $nameProvider,
        PathProviderInterface $pathProvider,
        string $listScreenClassName,
        string $editScreenClassName,
        string $updateScreenClassName,
        string $deleteControllerClassName
    )
    {
        $this->routeRegisterHelper = $routeRegisterHelper;
        $this->nameProvider = $nameProvider;
        $this->pathProvider = $pathProvider;
        $this->listScreenClassName = $listScreenClassName;
        $this->createScreenClassName = $editScreenClassName;
        $this->updateScreenClassName = $updateScreenClassName;
        $this->deleteControllerClassName = $deleteControllerClassName;
    }

    /**
     * @param RoutingRegistrarInterface $router
     */
    public function registerRoutes(RoutingRegistrarInterface $router)
    {
        $this->routeRegisterHelper->addCrudRoutes(
            $router,
            $this->pathProvider,
            $this->nameProvider,
            $this->listScreenClassName,
            $this->createScreenClassName,
            $this->updateScreenClassName,
            $this->deleteControllerClassName
        );
    }
}
