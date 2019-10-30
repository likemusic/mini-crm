<?php

namespace App\Entity\Base;

use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\Entity\Base\UseVariantProvider\ListingInterface as  ListUseVariantProviderInterface;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Menu;
use App\Contract\MainMenu\ItemData\ChildInterface as  ChildMenuItemDataInterface;

class MenuRegistrar
{
    /** @var string */
    private $menuPlace;

    /** @var ListUseVariantProviderInterface */
    private $useVariantProvider;

    /** @var string */
    private $menuIcon;

    /** @var RouteNameProviderInterface */
    private $routeNameProvider;

    /** @var string */
    private $menuTitle;

    /**
     * @var ChildMenuItemDataInterface
     */
    private $menuItemData;

    public function __construct(
        string $menuPlace,
        ListUseVariantProviderInterface $useVariantProvider,
        RouteNameProviderInterface $routeNameProvider,
        ChildMenuItemDataInterface $menuItemData,
        ?string $menuIcon = null,
        ?string $menuTitle = null
    ) {
        $this->menuPlace = $menuPlace;
        $this->menuIcon = $menuIcon;
        $this->menuTitle = $menuTitle;
        $this->useVariantProvider = $useVariantProvider;
        $this->routeNameProvider = $routeNameProvider;
        $this->menuItemData = $menuItemData;
    }

    public function register(Menu $menu, $place = null)
    {
        if (!$place) {
            $place = $this->menuPlace;
        }

        $menuItem = $this->createMenuItem();
        $menu->add($place, $menuItem);
    }

    private function createMenuItem()
    {
        $label = $this->getMenuLabel();
        $routeName = $this->getMenuRouteName();
        $menuIcon = $this->getMenuIcon();
        $menuTitle = $this->getMenuTitle();

        return ItemMenu::label($label)
            ->icon($menuIcon )
            ->route($routeName)
            ->title($this->menuTitle);
    }

    private function getMenuTitle()
    {
        return $this->menuItemData->getTitle();
    }

    private function getMenuIcon()
    {
        return $this->menuItemData->getIcon();
    }

    /**
     * @return string
     */
    private function getMenuLabel()
    {
        return $this->menuItemData->getLabel();
    }

    /**
     * @return string
     */
    private function getMenuRouteName()
    {
        return $this->menuItemData->getRouteName();
    }
}
