<?php


namespace App\Menu\Main\NotRoot;

use App\EntityMeta\DataProvider\ByName\PermissionProvider\InstanceProvider as PermissionsProviderProvider;
use App\Contract\Entity\Base\PermissionsProviderInterface;

class MenuEntityPermissionByMenuItemNameProvider
{
    /**
     * @var EntityNameByMenuItemNameProvider
     */
    private $entityNameByMenuItemNameProvider;

    /**
     * @var PermissionsProviderProvider
     */
    private $permissionsProviderProvider;


    public function __construct(
        EntityNameByMenuItemNameProvider $entityNameByMenuItemNameProvider,
        PermissionsProviderProvider $permissionsProviderProvider
    )
    {
        $this->entityNameByMenuItemNameProvider = $entityNameByMenuItemNameProvider;
        $this->permissionsProviderProvider = $permissionsProviderProvider;
    }

    public function getEntityPermissionByMenuItemName(string $menuItemName): string
    {
        $entityName = $this->getEntityNameByMenuChildItemName($menuItemName);

        return $this->getMenuEntityPermissionByEntityName($entityName);
    }

    private function getMenuEntityPermissionByEntityName(string $entityName): string
    {
        return $this->getEntityListPermissionByEntityName($entityName);
    }

    private function getEntityNameByMenuChildItemName(string $childMenuItemName): string
    {
        return $this->entityNameByMenuItemNameProvider->getEntityNameByMenuItemName($childMenuItemName);
    }

    private function getEntityListPermissionByEntityName(string $entityName)
    {
        $entityPermissionProvider = $this->getEntityPermissionProvider($entityName);

        return $entityPermissionProvider->getList();
    }

    private function getEntityPermissionProvider(string $entityName): PermissionsProviderInterface
    {
        return $this->permissionsProviderProvider->getValueByKey($entityName);
    }
}
