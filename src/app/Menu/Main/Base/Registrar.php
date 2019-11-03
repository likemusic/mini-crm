<?php

namespace App\Menu\Main\Base;

use App\Common\User\GetCurrentUserTrait;
use App\Contract\MainMenu\ItemData\BaseInterface as MenuItemDataInterface;
use App\Contract\MainMenu\RegistrarInterface;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Menu;

abstract class Registrar implements RegistrarInterface
{
    use GetCurrentUserTrait;

    /** @var MenuItemDataInterface */
    protected $itemData;

    public function __construct(
        MenuItemDataInterface $itemData
    )
    {
        $this->itemData = $itemData;
    }

    public function addMenu(Menu $menu, string $place = Menu::MAIN)
    {
        $menuItem = $this->getMenuItem();

        $this->addMenuItem($menu, $menuItem);

        $menu->add($place, $menuItem);
    }

    protected function getMenuItem()
    {
        $menuLabel = $this->getMenuLabel();
        $menuIcon = $this->getMenuIcon();
        $menuSlug = $this->getMenuSlug();

        $menuItem = $this->createMenuItem(
            $menuLabel,
            $menuSlug,
            $menuIcon
        );

        return $menuItem;
    }

    protected function getMenuLabel(): string
    {
        return $this->itemData->getLabel();
    }

    protected function getMenuIcon(): string
    {
        return $this->itemData->getIcon();
    }

    protected function getMenuSlug(): string
    {
        return $this->itemData->getSlug();
    }

    protected function createMenuItem(
        string $label,
        string $slug,
        string $menuIcon = null,
        $routeName = null,
        $menuTitle = null
    )
    {
        $menuItem = ItemMenu::label($label)->slug($slug);

        if ($menuIcon) {
            $menuItem->icon($menuIcon);
        }

        if ($routeName) {
            $menuItem->route($routeName);
        }

        if ($menuTitle) {
            $menuItem->title($menuTitle);
        }

        return $menuItem;
    }

    private function addMenuItem(Menu $menu, ItemMenu $menuItem, $place = Menu::MAIN)
    {
        $menu->add($place, $menuItem);
    }

    protected function isCurrentUserHasAccess(string $permisssion)
    {
        $currentUser = $this->getCurrentUser();

        return $currentUser->hasAccess($permisssion);
    }
}
