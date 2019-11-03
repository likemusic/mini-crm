<?php

namespace App\Entity\Base\Screens\Can;

use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;

trait CreateTrait
{
    protected function canCreate(): bool
    {
        if (!$this->createPermissionExists()) {
            return false;
        }

        $currentUser = $this->getCurrentUser();
        $permission = $this->getCreatePermission();

        return $currentUser->hasAccess($permission);
    }

    protected function getCreatePermission(): string
    {
        $constantName = PermissionConstantNameInterface::CREATE;

        return $this->getPermissionClassConstant($constantName);
    }

    private function createPermissionExists()
    {
        $constantName = PermissionConstantNameInterface::CREATE;

        return $this->getPermissionClassConstantExists($constantName);
    }
}
