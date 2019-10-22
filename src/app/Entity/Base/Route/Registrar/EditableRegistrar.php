<?php

namespace App\Entity\Base\Route\Registrar;

use App\Contract\Entity\Base\Route\NameProviderInterface;
use App\Contract\Entity\Base\Route\PathProviderInterface;
use App\Contract\Entity\Base\Route\RegistrarInterface;
use App\Helper\RouteRegisterHelper;
use Illuminate\Contracts\Routing\Registrar as RoutingRegistrarInterface;

class EditableRegistrar implements RegistrarInterface
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
     * Registrar constructor.
     * @param RouteRegisterHelper $routeRegisterHelper
     * @param NameProviderInterface $nameProvider
     * @param PathProviderInterface $pathProvider
     * @param string $listScreenClassName
     * @param string $editScreenClassName
     * @param string $updateScreenClassName
     */
    public function __construct(
        RouteRegisterHelper $routeRegisterHelper,
        NameProviderInterface $nameProvider,
        PathProviderInterface $pathProvider,
        string $listScreenClassName,
        string $editScreenClassName,
        string $updateScreenClassName
    ) {
        $this->routeRegisterHelper = $routeRegisterHelper;
        $this->nameProvider = $nameProvider;
        $this->pathProvider = $pathProvider;
        $this->listScreenClassName = $listScreenClassName;
        $this->createScreenClassName = $editScreenClassName;
        $this->updateScreenClassName = $updateScreenClassName;
    }

    /**
     * @param RoutingRegistrarInterface $router
     */
    public function registerRoutes(RoutingRegistrarInterface $router)
    {
        $this->routeRegisterHelper->addEditableRoutes(
            $router,
            $this->pathProvider,
            $this->nameProvider,
            $this->listScreenClassName,
            $this->createScreenClassName,
            $this->updateScreenClassName
        );
    }
}
