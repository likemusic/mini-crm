<?php

namespace App\Entity\Base;

use App\Contract\Entity\Base\BreadcrumbsRegistrarInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Base\UseVariantProviderInterface;
use App\Contract\Entity\Platform\Route\PlatformRouteNameInterface;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsManager;
use DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException;

class BreadcrumbsRegistrar implements BreadcrumbsRegistrarInterface
{
    private $breadcrumbsManager;

    /**
     * @var RouteNameProviderInterface
     */
    private $routeNameProvider;

    /**
     * @var BreadcrumbsHelper
     */
    private $breadcrumbsHelper;

    /**
     * @var UseVariantProviderInterface
     */
    private $useVariantProvider;

    public function __construct(
        BreadcrumbsManager $breadcrumbsManager,
        BreadcrumbsHelper $breadcrumbsHelper,
        RouteNameProviderInterface $routeNameProvider,
        UseVariantProviderInterface $useVariantProvider
    ) {
        $this->breadcrumbsManager = $breadcrumbsManager;
        $this->routeNameProvider = $routeNameProvider;
        $this->breadcrumbsHelper = $breadcrumbsHelper;
        $this->useVariantProvider = $useVariantProvider;
    }

    /**
     * @throws DuplicateBreadcrumbException
     */
    public function register()
    {
        $breadcrumbsHelper = $this->breadcrumbsHelper;
        $useVariantProvider = $this->useVariantProvider;
        $routeNameProvider = $this->routeNameProvider;

        $this->addBreadcrumbNew($breadcrumbsHelper, $useVariantProvider, $routeNameProvider);
        $this->addBreadcrumbEdit($breadcrumbsHelper, $useVariantProvider, $routeNameProvider);
        $this->addBreadcrumbList($breadcrumbsHelper, $useVariantProvider, $routeNameProvider);
    }

    /**
     * @param BreadcrumbsHelper $breadcrumbsHelper
     * @param UseVariantProviderInterface $useVariantProvider
     * @param RouteNameProviderInterface $routeNameProvider
     * @throws DuplicateBreadcrumbException
     */
    private function addBreadcrumbNew(
        BreadcrumbsHelper $breadcrumbsHelper,
        UseVariantProviderInterface $useVariantProvider,
        RouteNameProviderInterface $routeNameProvider
    ) {
        $routeName = $this->getRouteNameNew();
        $parentRouteName = $routeNameProvider->getList();
        $name = $breadcrumbsHelper->getCreateName($useVariantProvider->getGenitiveName());

        $this->registerBreadcrumb($routeName, $parentRouteName, $name);
    }

    private function getRouteNameNew()
    {
        return $this->routeNameProvider->getNew();
    }

    /**
     * @param string $routeName
     * @param string $parentRouteName
     * @param string $name
     * @throws DuplicateBreadcrumbException
     */
    private function registerBreadcrumb(string $routeName, string $parentRouteName, string $name)
    {
        $this->breadcrumbsManager->for(
            $routeName,
            function (BreadcrumbsGenerator $trail) use ($parentRouteName, $name) {
                $trail->parent($parentRouteName);
                $trail->push($name);
            });
    }

    /**
     * @param BreadcrumbsHelper $breadcrumbsHelper
     * @param UseVariantProviderInterface $useVariantProvider
     * @param RouteNameProviderInterface $routeNameProvider
     * @throws DuplicateBreadcrumbException
     */
    private function addBreadcrumbEdit(
        BreadcrumbsHelper $breadcrumbsHelper,
        UseVariantProviderInterface $useVariantProvider,
        RouteNameProviderInterface $routeNameProvider
    ) {
        $routeName = $routeNameProvider->getEdit();
        $parentRouteName = $routeNameProvider->getList();
        $name = $breadcrumbsHelper->getUpdateName($useVariantProvider->getGenitiveName());

        $this->registerBreadcrumb($routeName, $parentRouteName, $name);
    }

    /**
     * @param BreadcrumbsHelper $breadcrumbsHelper
     * @param UseVariantProviderInterface $useVariantProvider
     * @param RouteNameProviderInterface $routeNameProvider
     * @throws DuplicateBreadcrumbException
     */
    private function addBreadcrumbList(
        BreadcrumbsHelper $breadcrumbsHelper,
        UseVariantProviderInterface $useVariantProvider,
        RouteNameProviderInterface $routeNameProvider)
    {
        $routeName = $routeNameProvider->getList();
        $parentRouteName = PlatformRouteNameInterface::INDEX;
        $name = $breadcrumbsHelper->getListName($useVariantProvider->getListName());

        $this->registerBreadcrumb($routeName, $parentRouteName, $name);
    }
}
