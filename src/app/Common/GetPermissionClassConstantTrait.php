<?php

namespace App\Common;

trait GetPermissionClassConstantTrait
{
    protected function getPermissionClassConstant(string $constantName): string
    {
        $permissionClassName = $this->getPermissionsClassName();

        return $this->getClassConstantValue($permissionClassName, $constantName);
    }

    abstract protected function getPermissionsClassName(): string;

    private function getClassConstantValue($className, $constantName): string
    {
        return constant("{$className}::{$constantName}");
    }
}
