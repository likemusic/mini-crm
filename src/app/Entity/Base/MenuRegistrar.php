<?php

namespace App\Entity\Base;

use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Base\NotEditableUseVariantProviderInterface;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Menu;

class MenuRegistrar
{
    /** @var string */
    private $menuPlace;

    /** @var NotEditableUseVariantProviderInterface */
    private $useVariantProvider;

    /** @var string */
    private $menuIcon;

    /** @var RouteNameProviderInterface */
    private $routeNameProvider;

    /** @var string */
    private $menuTitle;

    public function __construct(
        string $menuPlace,
        NotEditableUseVariantProviderInterface $useVariantProvider,
        RouteNameProviderInterface $routeNameProvider,
        ?string $menuIcon = null,
        ?string $menuTitle = null
    ) {
        $this->menuPlace = $menuPlace;
        $this->menuIcon = $menuIcon;
        $this->menuTitle = $menuTitle;
        $this->useVariantProvider = $useVariantProvider;
        $this->routeNameProvider = $routeNameProvider;
    }

    public function register(Menu $menu, $place = null)
    {
        if (!$place) {
            $place = $this->menuPlace;
        }

        $menuItem = $this->getMenuItem();
        $menu->add($place, $menuItem);
    }

    private function getMenuItem()
    {
        $label = $this->getMenuLabel();
        $routeName = $this->getRouteName();

        return ItemMenu::label($label)
            ->icon($this->menuIcon)
            ->route($routeName)
            ->title($this->menuTitle);
    }

    /**
     * @return string
     */
    private function getMenuLabel()
    {
        return $this->useVariantProvider->getListName();
    }

    /**
     * @return string
     */
    private function getRouteName()
    {
        return $this->routeNameProvider->getList();
    }
}
