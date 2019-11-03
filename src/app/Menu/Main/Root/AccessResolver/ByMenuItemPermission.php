<?php

namespace App\Menu\Main\Root\AccessResolver;

use App\Menu\Main\Base\AccessResolver\ByMenuItemPermission as BaseByMenuItemPermission;
use App\Menu\Main\PermissionToCrmPermissionsConverter;

class ByMenuItemPermission extends BaseByMenuItemPermission
{
    /** @var PermissionToCrmPermissionsConverter */
    private $toCrmPermissionsConverter;

    public function __construct(PermissionToCrmPermissionsConverter $toCrmPermissionsConverter)
    {
        $this->toCrmPermissionsConverter = $toCrmPermissionsConverter;
    }

    public function canAccess(string $menuItemPermission): bool
    {
        $userPermissions = $this->getUserPermissionsByRootMenuItemPermission($menuItemPermission);

        foreach ($userPermissions as $permission) {
            if ($this->isCurrentUserHasAccess($permission)) {
                return true;
            }
        }

        return false;
    }

    private function getUserPermissionsByRootMenuItemPermission(string $rootMenuItemPermission): array
    {
        return $this->toCrmPermissionsConverter->getCrmPermissionByMainMenuPermission($rootMenuItemPermission);
    }
}
