<?php

namespace App\Common\Permission;

trait GetPermissionClassConstantTrait
{
    protected function getPermissionClassConstant(string $constantName): string
    {
        $permissionClassName = $this->getPermissionsClassName();

        return $this->getClassConstantValue($permissionClassName, $constantName);
    }

    protected function getPermissionClassConstantExists(string $constantName): string
    {
        $permissionClassName = $this->getPermissionsClassName();

        return $this->isClassConstantExists($permissionClassName, $constantName);
    }

    private function isClassConstantExists($className, $constantName)
    {
        return defined("{$className}::{$constantName}");
    }

    abstract protected function getPermissionsClassName(): string;

    private function getClassConstantValue($className, $constantName): string
    {
        return constant("{$className}::{$constantName}");
    }
}
