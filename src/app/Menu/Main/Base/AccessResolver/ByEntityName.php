<?php

namespace App\Menu\Main\Base\AccessResolver;

use App\Common\User\IsCurrentUserCanAccess;
use App\Menu\Main\NotRoot\MenuEntityPermissionByEntityName;

class ByEntityName
{
    use IsCurrentUserCanAccess;

    /** @var MenuEntityPermissionByEntityName */
    private $menuEntityPermissionByEntityName;

    public function __construct(MenuEntityPermissionByEntityName $menuEntityPermissionByEntityName)
    {
        $this->menuEntityPermissionByEntityName = $menuEntityPermissionByEntityName;
    }

    public function canAccess(string $entityName): bool
    {
        $menuEntityPermission = $this->getMenuEntityPermissionByEntityName($entityName);

        return $this->isCurrentUserHasAccess($menuEntityPermission);
    }

    private function getMenuEntityPermissionByEntityName(string $entityName): string
    {
        return $this->menuEntityPermissionByEntityName->getEntityPermissionByEntityName($entityName);
    }
}
