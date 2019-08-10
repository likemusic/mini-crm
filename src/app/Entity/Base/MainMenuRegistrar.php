<?php

namespace App\Entity\Base;

use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Base\UseVariantProviderInterface;
use App\Entity\Base\MenuRegistrar as BaseMenuRegistrar;
use Orchid\Platform\Menu;

class MainMenuRegistrar extends BaseMenuRegistrar
{
    public function __construct(
        UseVariantProviderInterface $useVariantProvider,
        RouteNameProviderInterface $routeNameProvider,
        ?string $menuTitle = null,
        ?string $menuIcon = null
    ) {
        $menuPlace = Menu::MAIN;
        parent::__construct($menuPlace, $useVariantProvider, $routeNameProvider, $menuIcon, $menuTitle);
    }
}
