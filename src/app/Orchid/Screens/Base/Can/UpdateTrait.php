<?php

namespace App\Orchid\Screens\Base\Can;

use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;

trait UpdateTrait
{
    protected function canUpdate(): bool
    {
        $currentUser = $this->getCurrentUser();
        $permission = $this->getUpdatePermission();

        return $currentUser->hasAccess($permission);
    }

    protected function getUpdatePermission(): string
    {
        $constantName = PermissionConstantNameInterface::UPDATE;

        return $this->getPermissionClassConstant($constantName);
    }
}
