<?php

namespace App\Orchid\Screens\Base;

use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;

trait CanCreateTrait
{
    private function canCreate(): bool
    {
        $currentUser = $this->getCurrentUser();
        $permission = $this->getCreatePermission();

        return $currentUser->hasAccess($permission);
    }

    private function getCreatePermission(): string
    {
        $constantName = PermissionConstantNameInterface::DELETE;

        return $this->getPermissionClassConstant($constantName);
    }
}
