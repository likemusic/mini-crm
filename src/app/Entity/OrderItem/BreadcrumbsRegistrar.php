<?php

namespace App\Entity\OrderItem;

use App\Entity\Base\BreadcrumbsRegistrar\Editable as BaseBreadcrumbsRegistrar;
use App\Entity\OrderItem\Route\NameProvider as RouteNameProvider;
use App\Entity\OrderItem\CrudUseVariantProvider as UseVariantProvider;
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
