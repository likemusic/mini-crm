<?php

namespace App\Entity\Base;

use App\Contract\Entity\Base\PermissionsProviderInterface;
use App\Contract\Entity\Permission\ConstantNameInterface;

abstract class PermissionProvider implements PermissionsProviderInterface
{
    public function getList(): string
    {
        $classConstant = ConstantNameInterface::LIST;

        return $this->getPermissionClassConstantValue($classConstant);
    }

    abstract protected function getPermissionsClassName(): string;

    protected function getPermissionClassConstantValue($constantName)
    {
        $permissionsClassName = $this->getPermissionsClassName();

        return $this->getClassConstantValue($permissionsClassName, $constantName);
    }

    private function getClassConstantValue($className, $constantName)
    {
        return constant("{$className}::{$constantName}");
    }

    public function getCreate(): string
    {
        $classConstant = ConstantNameInterface::CREATE;

        return $this->getPermissionClassConstantValue($classConstant);
    }

    public function getUpdate(): string
    {
        $classConstant = ConstantNameInterface::UPDATE;

        return $this->getPermissionClassConstantValue($classConstant);
    }

    public function getDelete(): string
    {
        $classConstant = ConstantNameInterface::DELETE;

        return $this->getPermissionClassConstantValue($classConstant);
    }
}
