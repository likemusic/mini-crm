<?php

namespace App\Menu\Main\NotRoot;

use App\DataProvider\Entity\PermissionsProviderProvider;
use App\Contract\Entity\Base\PermissionsProviderInterface;

class MenuEntityPermissionByEntityName
{
    private $permissionsProviderProvider;

    public function __construct(PermissionsProviderProvider $permissionsProviderProvider)
    {
        $this->permissionsProviderProvider = $permissionsProviderProvider;
    }

    public function getEntityPermissionByEntityName(string $entityName): string
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
