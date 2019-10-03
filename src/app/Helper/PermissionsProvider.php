<?php

namespace App\Helper;


use ReflectionException;

class PermissionsProvider
{
    /**
     * @var ReflectionHelper
     */
    private $reflectionHelper;

    private function __construct(ReflectionHelper $reflectionHelper)
    {
        $this->reflectionHelper = $reflectionHelper;
    }

    private $permissionsClasses = [
        ReflectionHelper::class,
    ];

    public function getAvailablePermissions()
    {
        $permissions = [];

        foreach ($this->permissionsClasses as $permissionClassName) {
            $classPermissions = $this->getClassConstants($permissionClassName);
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
}
