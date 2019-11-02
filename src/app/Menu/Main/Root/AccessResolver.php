<?php

namespace App\Menu\Main\Root;

use App\Common\User\GetCurrentUserTrait;
use App\Menu\Main\PermissionToCrmPermissionsConverter;

class AccessResolver
{
    use GetCurrentUserTrait;

    /** @var PermissionToCrmPermissionsConverter */
    private $toCrmPermissionsConverter;

    public function __construct(PermissionToCrmPermissionsConverter $toCrmPermissionsConverter)
    {
        $this->toCrmPermissionsConverter = $toCrmPermissionsConverter;
    }

    public function canAccess(string $rootMenuItemPermission): bool
    {
        $userPermissions = $this->getUserPermissionsByRootMenuItemPermission($rootMenuItemPermission);

        foreach ($userPermissions as $permission) {
            if ($this->isCurrentUserHasAccess($permission)) {
                return true;
            }
        }

        return false;
    }

    protected function isCurrentUserHasAccess(string $permission)
    {
        $currentUser = $this->getCurrentUser();

        return $currentUser->hasAccess($permission);
    }


    private function getUserPermissionsByRootMenuItemPermission(string $rootMenuItemPermission): array
    {
        return $this->toCrmPermissionsConverter->getCrmPermissionByMainMenuPermission($rootMenuItemPermission);
    }
}
