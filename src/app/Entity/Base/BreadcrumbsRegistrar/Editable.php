<?php

namespace App\Entity\Base\BreadcrumbsRegistrar;

use App\Contract\Entity\Base\EditableInterface;
use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;
use App\Contract\Entity\Platform\Route\NameInterface as PlatformRouteNameInterface;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsManager;
use DaveJamesMiller\Breadcrumbs\Exceptions\DuplicateBreadcrumbException;

class Editable extends NotEditable implements EditableInterface
{
    public function __construct(
        BreadcrumbsManager $breadcrumbsManager,
        BreadcrumbsHelper $breadcrumbsHelper,
        RouteNameProviderInterface $routeNameProvider,
        CrudUseVariantProviderInterface $useVariantProvider
    ) {
        parent::__construct($breadcrumbsManager, $breadcrumbsHelper, $routeNameProvider, $useVariantProvider);
    }

    /**
     * @throws DuplicateBreadcrumbException
     */
    public function register()
    {
        parent::register();

        $breadcrumbsHelper = $this->breadcrumbsHelper;
        $useVariantProvider = $this->useVariantProvider;
        $routeNameProvider = $this->routeNameProvider;

        $this->addBreadcrumbNew($breadcrumbsHelper, $useVariantProvider, $routeNameProvider);
        $this->addBreadcrumbEdit($breadcrumbsHelper, $useVariantProvider, $routeNameProvider);
    }

    /**
     * @param BreadcrumbsHelper $breadcrumbsHelper
     * @param CrudUseVariantProviderInterface $useVariantProvider
     * @param RouteNameProviderInterface $routeNameProvider
     * @throws DuplicateBreadcrumbException
     */
    private function addBreadcrumbNew(
        BreadcrumbsHelper $breadcrumbsHelper,
        CrudUseVariantProviderInterface $useVariantProvider,
        RouteNameProviderInterface $routeNameProvider
    ) {
        $routeName = $this->getRouteNameNew();
        $parentRouteName = $routeNameProvider->getList();
        $name = $breadcrumbsHelper->getCreateName($useVariantProvider->getGenitiveName());

        $this->registerBreadcrumb($routeName, $parentRouteName, $name);
    }

    private function getRouteNameNew()
    {
        return $this->routeNameProvider->getCreate();
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
     * @param CrudUseVariantProviderInterface $useVariantProvider
     * @param RouteNameProviderInterface $routeNameProvider
     * @throws DuplicateBreadcrumbException
     */
    private function addBreadcrumbEdit(
        BreadcrumbsHelper $breadcrumbsHelper,
        CrudUseVariantProviderInterface $useVariantProvider,
        RouteNameProviderInterface $routeNameProvider
    ) {
        $routeName = $routeNameProvider->getEdit();
        $parentRouteName = $routeNameProvider->getList();
        $name = $breadcrumbsHelper->getUpdateName($useVariantProvider->getGenitiveName());

        $this->registerBreadcrumb($routeName, $parentRouteName, $name);
    }

    /**
     * @param BreadcrumbsHelper $breadcrumbsHelper
     * @param CrudUseVariantProviderInterface $useVariantProvider
     * @param RouteNameProviderInterface $routeNameProvider
     * @throws DuplicateBreadcrumbException
     */
    private function addBreadcrumbList(
        BreadcrumbsHelper $breadcrumbsHelper,
        CrudUseVariantProviderInterface $useVariantProvider,
        RouteNameProviderInterface $routeNameProvider)
    {
        $routeName = $routeNameProvider->getList();
        $parentRouteName = PlatformRouteNameInterface::INDEX;
        $name = $breadcrumbsHelper->getListName($useVariantProvider->getListName());

        $this->registerBreadcrumb($routeName, $parentRouteName, $name);
    }
}
