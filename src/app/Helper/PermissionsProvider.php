<?php

namespace App\Helper;

use ReflectionException;
use App\Contract\Entity\Platform\PermissionInterface;

class PermissionsProvider
{
    /**
     * @var ReflectionHelper
     */
    private $reflectionHelper;

    public function __construct(ReflectionHelper $reflectionHelper)
    {
        $this->reflectionHelper = $reflectionHelper;
    }

    private $permissionsClasses = [
        PermissionInterface::class,
    ];

    public function getAvailablePermissions()
    {
        $permissions = [];

        foreach ($this->permissionsClasses as $permissionClassName) {
            $classPermissions = $this->getClassConstantsValues($permissionClassName);
            $permissions = array_merge($permissions, $classPermissions);
        }

        return $permissions;
    }

    /**
     * @param $className
     * @return array
     * @throws ReflectionException
     */
    private function getClassConstants($className)
    {
        return $this->reflectionHelper->getClassConstants($className);
    }

    private function getClassConstantsValues($className)
    {
        $classConstants = $this->getClassConstants($className);

        return array_values($classConstants);
    }
}
