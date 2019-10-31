<?php

namespace App\Entity\Warehouse;

use App\Entity\Base\BreadcrumbsRegistrar\Editable as BaseBreadcrumbsRegistrar;
use App\Entity\Warehouse\Route\NameProvider as RouteNameProvider;
use App\Entity\Warehouse\CrudUseVariantProvider as UseVariantProvider;
use App\Common\Page\Element\BreadcrumbsHelper as BreadcrumbsHelper;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsManager;

class BreadcrumbsRegistrar extends BaseBreadcrumbsRegistrar
{
    public function __construct(
        BreadcrumbsManager $breadcrumbsManager,
        BreadcrumbsHelper $breadcrumbsHelper,
        RouteNameProvider $routeNameProvider,
        CrudUseVariantProvider $useVariantProvider
    ) {
        parent::__construct(
            $breadcrumbsManager,
            $breadcrumbsHelper,
            $routeNameProvider,
            $useVariantProvider
        );
    }
}
