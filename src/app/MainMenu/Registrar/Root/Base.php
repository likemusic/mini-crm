<?php

namespace App\MainMenu\Registrar\Root;

use App\Helper\MainMenu\PermissionToCrmPermissionsConverter as MainMenuPermissionToCrmPermissionsConverter;
use App\MainMenu\Registrar\Base as ParentClass;
use Orchid\Platform\Menu;
use App\Contract\MainMenu\ItemData\RootInterface as RootMenuItemDataInterface;

abstract class Base extends ParentClass
{
    /** @var MainMenuPermissionToCrmPermissionsConverter */
    private $mainMenuPermissionToCrmPermissionsConverter;

    public function __construct(
        MainMenuPermissionToCrmPermissionsConverter $mainMenuPermissionToCrmPermissionsConverter,
        RootMenuItemDataInterface $itemData
    )
    {
        $this->mainMenuPermissionToCrmPermissionsConverter = $mainMenuPermissionToCrmPermissionsConverter;

        parent::__construct($itemData);
    }

    protected function createMenuItem(string $label, string $slug, string $menuIcon = null, $routeName = null, $menuTitle = null)
    {
        $menuItem = parent::createMenuItem($label, $slug, $menuIcon, $routeName, $menuTitle);

        $menuItem->childs();

        return $menuItem;
    }

    protected function canAccessMenu(string $menuPermission): bool
    {
        $crmPermissions = $this->getCRMPermissionsByMenuPermission($menuPermission);

        foreach ($crmPermissions as $crmPermission) {
            if ($this->isCurrentUserHasAccess($crmPermission)) {
                return true;
            }
        }

        return false;
    }

    private function getCRMPermissionsByMenuPermission(string $menuPermission): array
    {
        return $this->mainMenuPermissionToCrmPermissionsConverter->getCrmPermissionByMainMenuPermission($menuPermission);
    }

    protected function addMenu(Menu $menu, string $place = Menu::MAIN)
    {
        parent::addMenu($menu);

        $slug = $this->getMenuSlug();

        $this->addChildMenuItems($menu, $slug);
    }

    private function addChildMenuItems(Menu $menu, string $slug)
    {
        $childMenuRegistrars = $this->getChildMenuRegistrars();

        $this->addChildMenuItemsByRegistrars($menu, $slug, $childMenuRegistrars);
    }

    abstract protected function getChildMenuRegistrars(): array;

    private function addChildMenuItemsByRegistrars(Menu $menu, string $slug, array $childMenuRegistrars)
    {
        foreach ($childMenuRegistrars as $childMenuRegistrar) {
            $childMenuRegistrar->registerIfHasAccess($menu, $slug);
        }
    }
}
