<?php

namespace App\Entity\Base\Screens\Can;

use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;

trait UpdateTrait
{
    protected function canUpdate(): bool
    {
        if (!$this->updatePermissionExists()) {
            return false;
        }

        $currentUser = $this->getCurrentUser();
        $permission = $this->getUpdatePermission();

        return $currentUser->hasAccess($permission);
    }

    protected function getUpdatePermission(): string
    {
        $constantName = PermissionConstantNameInterface::UPDATE;

        return $this->getPermissionClassConstant($constantName);
    }

    private function updatePermissionExists()
    {
        $constantName = PermissionConstantNameInterface::UPDATE;

        return $this->getPermissionClassConstantExists($constantName);
    }
}
