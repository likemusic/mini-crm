<?php

namespace App\Entity\Base\BreadcrumbsRegistrar;

use App\Contract\Entity\Base\EditableInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Base\UseVariantProvider\ListingInterface as  ListUseVariantProviderInterface;
use App\Contract\Entity\Platform\Route\NameInterface as PlatformRouteNameInterface;
use App\Common\Page\Element\BreadcrumbsHelper as BreadcrumbsHelper;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsManager;
use DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException;

class NotEditable implements EditableInterface
{
    protected $breadcrumbsManager;

    /**
     * @var RouteNameProviderInterface
     */
    protected $routeNameProvider;

    /**
     * @var BreadcrumbsHelper
     */
    protected $breadcrumbsHelper;

    /**
     * @var ListUseVariantProviderInterface
     */
    protected $useVariantProvider;

    public function __construct(
        BreadcrumbsManager $breadcrumbsManager,
        BreadcrumbsHelper $breadcrumbsHelper,
        RouteNameProviderInterface $routeNameProvider,
        ListUseVariantProviderInterface $useVariantProvider
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

        $this->addBreadcrumbList($breadcrumbsHelper, $useVariantProvider, $routeNameProvider);
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
     * @param ListUseVariantProviderInterface $useVariantProvider
     * @param RouteNameProviderInterface $routeNameProvider
     * @throws DuplicateBreadcrumbException
     */
    private function addBreadcrumbList(
        BreadcrumbsHelper $breadcrumbsHelper,
        ListUseVariantProviderInterface $useVariantProvider,
        RouteNameProviderInterface $routeNameProvider)
    {
        $routeName = $routeNameProvider->getList();
        $parentRouteName = PlatformRouteNameInterface::INDEX;
        $name = $breadcrumbsHelper->getListName($useVariantProvider->getListName());

        $this->registerBreadcrumb($routeName, $parentRouteName, $name);
    }
}
