<?php

namespace App\Entity\Role;

use App\Contract\Entity\Role\MenuInterface;
use App\Entity\Base\MainMenuRegistrar as BaseMenuRegistrar;
use App\Entity\Role\Route\NameProvider as RouteNameProvider;

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
