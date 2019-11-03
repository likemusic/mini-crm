<?php

namespace App\Menu\Main\Root\Base;

use App\Contract\MainMenu\ItemData\RootInterface as RootMenuItemDataInterface;
use App\Contract\MainMenu\Registrar\ChildInterface as ChildMenuRegistrarInterface;
use App\Contract\MainMenu\RegistrarInterface;
use App\Menu\Main\Base\Registrar as BaseRegistrar;
use App\Menu\Main\ChildrenItemNamesProvider;
use App\Menu\Main\NotRoot\AccessResolver\ByMenuItemName as ByMenuItemNameAccessResolver;
use App\Menu\Main\NotRoot\MenuRegistrarProvider as NotRootMenuRegistrarProvider;
use App\Menu\Main\Root\ItemNameByMenuRegistrarProvider;
use Orchid\Platform\Menu;

abstract class Registrar extends BaseRegistrar
{
    /** @var ItemNameByMenuRegistrarProvider */
    private $itemNameByMenuRegistrarProvider;

    /** @var ChildrenItemNamesProvider */
    private $childrenItemNamesProvider;

    /** @var NotRootMenuRegistrarProvider */
    private $notRootMenuRegistrarProvider;

    /** @var ByMenuItemNameAccessResolver */
    private $byMenuItemNameAccessResolver;

    public function __construct(
        RootMenuItemDataInterface $itemData,
        ItemNameByMenuRegistrarProvider $itemNameByMenuRegistrarProvider,
        ChildrenItemNamesProvider $childrenItemNamesProvider,
        NotRootMenuRegistrarProvider $notRootMenuRegistrarProvider,
        ByMenuItemNameAccessResolver $byMenuItemNameAccessResolver
    )
    {
        $this->itemNameByMenuRegistrarProvider = $itemNameByMenuRegistrarProvider;
        $this->childrenItemNamesProvider = $childrenItemNamesProvider;
        $this->notRootMenuRegistrarProvider = $notRootMenuRegistrarProvider;
        $this->byMenuItemNameAccessResolver = $byMenuItemNameAccessResolver;

        parent::__construct($itemData);
    }

    public function addMenu(Menu $menu, string $place = Menu::MAIN)
    {
        parent::addMenu($menu);

        $slug = $this->getMenuSlug();

        $this->addChildMenuItems($menu, $slug);
    }

    private function addChildMenuItems(Menu $menu, string $slug)
    {
        $childMenuRegistrars = $this->getAccessibleChildMenuRegistrars();

        $this->addChildMenuItemsByRegistrars($menu, $slug, $childMenuRegistrars);
    }

    private function getAccessibleChildMenuRegistrars(): array
    {
        $childMenuItemNames = $this->getAccessibleChildMenuItemNames();

        return $this->getChildMenuRegistrarsByNames($childMenuItemNames);
    }

    private function getAccessibleChildMenuItemNames()
    {
        $rootItemName = $this->getRootItemName();

        return $this->getAccessibleChildMenuItemNamesByRootItemName($rootItemName);
    }

    private function getRootItemName()
    {
        return $this->itemNameByMenuRegistrarProvider->getItemNameByMenuRegistrar($this);
    }

    private function getAccessibleChildMenuItemNamesByRootItemName($rootItemName)
    {
        $childrenItemNames = $this->getChildrenMenuItemNamesByRootItemName($rootItemName);

        return array_filter($childrenItemNames, [$this, 'isCurrentUserCanAccessChildMenuItem']);
    }

    private function getChildrenMenuItemNamesByRootItemName(string $rootItemName): array
    {
        return $this->childrenItemNamesProvider->getChildrenItemNamesByName($rootItemName);
    }

    /**
     * @param array $childMenuItemNames
     * @return ChildMenuRegistrarInterface[]
     */
    private function getChildMenuRegistrarsByNames(array $childMenuItemNames)
    {
        $ret = [];

        foreach ($childMenuItemNames as $childMenuItemName) {
            $ret[] = $this->getChildMenuRegistrarByItemName($childMenuItemName);
        }

        return $ret;
    }

    private function getChildMenuRegistrarByItemName(string $childMenuItemName)
    {
        return $this->notRootMenuRegistrarProvider->getRegistrarProviderByMenuItemName($childMenuItemName);
    }

    /**
     * @param Menu $menu
     * @param string $slug
     * @param RegistrarInterface[] $childMenuRegistrars
     */
    private function addChildMenuItemsByRegistrars(Menu $menu, string $slug, array $childMenuRegistrars)
    {
        foreach ($childMenuRegistrars as $childMenuRegistrar) {
            $childMenuRegistrar->addMenu($menu, $slug);
        }
    }

    protected function createMenuItem(string $label, string $slug, string $menuIcon = null, $routeName = null, $menuTitle = null)
    {
        $menuItem = parent::createMenuItem($label, $slug, $menuIcon, $routeName, $menuTitle);
        $menuItem->childs();

        return $menuItem;
    }

    private function isCurrentUserCanAccessChildMenuItem(string $childMenuItemName)
    {
        return $this->byMenuItemNameAccessResolver->canAccess($childMenuItemName);
    }
}
