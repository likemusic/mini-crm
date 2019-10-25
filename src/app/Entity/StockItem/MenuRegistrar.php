<?php

namespace App\Entity\StockItem;

use App\Contract\Entity\StockItem\MenuInterface;
use App\Entity\Base\MainMenuRegistrar as BaseMenuRegistrar;
use App\Entity\StockItem\Route\NameProvider as RouteNameProvider;

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
