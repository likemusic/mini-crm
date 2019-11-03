<?php

namespace App\Menu\Main;

use App\Menu\Main\NotRoot\EntityNameByMenuItemNameProvider;
use App\Menu\Main\NotRoot\MenuEntityPermissionByMenuItemNameProvider;
use App\Menu\Main\Root\ItemNameByPermissionNameProvider;

class PermissionToCrmPermissionsConverter
{
    /** @var ItemNameByPermissionNameProvider */
    private $itemNameByPermissionNameProvider;

    /** @var ChildrenItemNamesProvider */
    private $childrenItemNamesProvider;

    /** @var EntityNameByMenuItemNameProvider */
    private $entityNameByMenuItemNameProvider;

    /** @var MenuEntityPermissionByMenuItemNameProvider */
    private $entityPermissionByMenuItemNameProvider;

    public function __construct(
        ItemNameByPermissionNameProvider $itemNameByPermissionNameProvider,
        MenuEntityPermissionByMenuItemNameProvider $userPermissionByMenuItemNameProvider,
        ChildrenItemNamesProvider $childrenItemNamesProvider,
        EntityNameByMenuItemNameProvider $entityNameByMenuItemNameProvider
    )
    {
        $this->itemNameByPermissionNameProvider = $itemNameByPermissionNameProvider;
        $this->entityPermissionByMenuItemNameProvider = $userPermissionByMenuItemNameProvider;
        $this->childrenItemNamesProvider = $childrenItemNamesProvider;
        $this->entityNameByMenuItemNameProvider = $entityNameByMenuItemNameProvider;
    }

    public function getCrmPermissionByMainMenuPermission(string $mainMenuPermission): array
    {
        $rootMenuName = $this->getRootMenuNameByPermission($mainMenuPermission);
        $childMenuItemNames = $this->getChildMenuItemNames($rootMenuName);
        $childPermissions = $this->getPermissionsByMenuChildItemsNames($childMenuItemNames);

        return $childPermissions;
    }

    private function getRootMenuNameByPermission(string $mainMenuPermission): string
    {
        return $this->itemNameByPermissionNameProvider->getItemNameByPermissionName($mainMenuPermission);
    }

    private function getChildMenuItemNames(string $menuItemName): array
    {
        return $this->childrenItemNamesProvider->getChildrenItemNamesByName($menuItemName);
    }

    private function getPermissionsByMenuChildItemsNames(array $childMenuItemNames): array
    {
        $permissions = [];

        foreach ($childMenuItemNames as $childMenuItemName) {
            $permissions[] = $this->getEntityPermissionByMenuItemName($childMenuItemName);
        }

        return $permissions;
    }

    private function getEntityPermissionByMenuItemName(string $childMenuItemName)
    {
        return $this->entityPermissionByMenuItemNameProvider->getEntityPermissionByMenuItemName($childMenuItemName);
    }
}
