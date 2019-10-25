<?php

namespace App\Entity\Pharmacy;

use App\Entity\Base\BreadcrumbsRegistrar\NotEditable as BaseBreadcrumbsRegistrar;
use App\Entity\Pharmacy\Route\NameProvider as RouteNameProvider;
use App\Entity\Pharmacy\ListUseVariantProvider as NotEditableUseVariantProvider;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsManager;

class BreadcrumbsRegistrar extends BaseBreadcrumbsRegistrar
{
    public function __construct(
        BreadcrumbsManager $breadcrumbsManager,
        BreadcrumbsHelper $breadcrumbsHelper,
        RouteNameProvider $routeNameProvider,
        ListUseVariantProvider $useVariantProvider
    ) {
        parent::__construct(
            $breadcrumbsManager,
            $breadcrumbsHelper,
            $routeNameProvider,
            $useVariantProvider
        );
    }
}
