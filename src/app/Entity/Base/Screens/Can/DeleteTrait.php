<?php

namespace App\Entity\Base\Screens\Can;

use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;

trait DeleteTrait
{
    protected function canDelete(): bool
    {
        $currentUser = $this->getCurrentUser();
        $permission = $this->getDeletePermission();

        return $currentUser->hasAccess($permission);
    }

    protected function getDeletePermission(): string
    {
        $constantName = PermissionConstantNameInterface::DELETE;

        return $this->getPermissionClassConstant($constantName);
    }
}
