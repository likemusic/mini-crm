<?php

namespace App\Menu\Main;

use App\Contract\Entity\Base\PermissionsProviderInterface;
use App\DataProvider\Entity\PermissionsProviderProvider;
use App\Menu\Main\Root\ItemNameByPermissionNameProvider;
use App\Menu\Main\NotRoot\EntityNameByMenuItemNameProvider;

class PermissionToCrmPermissionsConverter
{
    /** @var ItemNameByPermissionNameProvider */
    private $itemNameByPermissionNameProvider;

    /** @var ChildrenItemNamesProvider */
    private $childrenItemNamesProvider;

    /** @var PermissionsProviderProvider */
    private $permissionsProviderProvider;

    /** @var EntityNameByMenuItemNameProvider */
    private $entityNameByMenuItemNameProvider;

    public function __construct(
        ItemNameByPermissionNameProvider $itemNameByPermissionNameProvider,
        ChildrenItemNamesProvider $childrenItemNamesProvider,
        PermissionsProviderProvider $permissionsProviderProvider,
        EntityNameByMenuItemNameProvider $entityNameByMenuItemNameProvider
    )
    {
        $this->itemNameByPermissionNameProvider = $itemNameByPermissionNameProvider;
        $this->childrenItemNamesProvider = $childrenItemNamesProvider;
        $this->permissionsProviderProvider = $permissionsProviderProvider;
        $this->entityNameByMenuItemNameProvider = $entityNameByMenuItemNameProvider;
    }

    public function getCrmPermissionByMainMenuPermission(string $mainMenuPermission): array
    {
        $rootMenuName = $this->getRootMenuNameByPermission($mainMenuPermission);
        $childMenuItemNames = $this->getChildMenuItemNames($rootMenuName);
        $childPermissions = $this->getPermissionsByMenuChildItemsNames($childMenuItemNames);

        return $childPermissions;
    }

    private function getPermissionsByMenuChildItemsNames(array $childMenuItemNames): array
    {
        $entityNames = $this->getEntityNamesByMenuChildItemNames($childMenuItemNames);

        return $this->getMenuPermissionsByEntityNames($entityNames);
    }

    private function getEntityNamesByMenuChildItemNames(array $childMenuItemNames): array
    {
        $ret = [];

        foreach ($childMenuItemNames as $childMenuItemName) {
            $ret[] = $this->getEntityNameByMenuChildItemName($childMenuItemName);
        }

        return $ret;
    }

    private function getEntityNameByMenuChildItemName(string $childMenuItemName): string
    {
        return $this->entityNameByMenuItemNameProvider->getEntityNameByMenuItemName($childMenuItemName);
    }

    private function getRootMenuNameByPermission(string $mainMenuPermission): string
    {
        return $this->itemNameByPermissionNameProvider->getItemNameByPermissionName($mainMenuPermission);
    }

    private function getChildMenuItemNames(string $menuItemName): array
    {
        return $this->childrenItemNamesProvider->getChildrenItemNamesByName($menuItemName);
    }

    /**
     * @param array $entityNames
     * @return string[]
     */
    private function getMenuPermissionsByEntityNames(array $entityNames): array
    {
        $ret = [];

        foreach ($entityNames as $entityName) {
            $ret[] = $this->getMenuPermissionByEntityName($entityName);
        }

        return $ret;
    }

    private function getMenuPermissionByEntityName(string $entityName): string
    {
        return $this->getEntityListPermissionByEntityName($entityName);
    }

    private function getEntityListPermissionByEntityName(string $entityName)
    {
        $entityPermissionProvider = $this->getEntityPermissionProvider($entityName);

        return $entityPermissionProvider->getList();
    }

    private function getEntityPermissionProvider(string $entityName): PermissionsProviderInterface
    {
        return $this->permissionsProviderProvider->getPermissionProviderByName($entityName);
    }
}
