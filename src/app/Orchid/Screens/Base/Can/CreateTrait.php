<?php

namespace App\Orchid\Screens\Base\Can;

use App\Contract\Entity\Permission\ConstantNameInterface as PermissionConstantNameInterface;

trait CreateTrait
{
    protected function canCreate(): bool
    {
        $currentUser = $this->getCurrentUser();
        $permission = $this->getCreatePermission();

        return $currentUser->hasAccess($permission);
    }

    protected function getCreatePermission(): string
    {
        $constantName = PermissionConstantNameInterface::CREATE;

        return $this->getPermissionClassConstant($constantName);
    }
}
