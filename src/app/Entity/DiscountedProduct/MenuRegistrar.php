<?php

namespace App\Entity\DiscountedProduct;

use App\Contract\Entity\DiscountedProduct\MenuInterface;
use App\Entity\Base\MainMenuRegistrar as BaseMenuRegistrar;
use App\Entity\DiscountedProduct\Route\NameProvider as RouteNameProvider;

class MenuRegistrar extends BaseMenuRegistrar
{
    public function __construct(
        CrudUseVariantProvider $useVariantProvider,
        RouteNameProvider $routeNameProvider
    ) {
        $menuTitle = null;
        $menuIcon = MenuInterface::ICON;

        parent::__construct($useVariantProvider, $routeNameProvider, $menuTitle, $menuIcon);
    }
}
