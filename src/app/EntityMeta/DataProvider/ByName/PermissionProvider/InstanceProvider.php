<?php

namespace App\EntityMeta\DataProvider\ByName\PermissionProvider;

use App\Base\DataProvider\ByClassNameProviderInstanceProvider;
use App\Contract\Entity\Base\PermissionsProviderInterface;
use Illuminate\Contracts\Container\Container;

class InstanceProvider extends ByClassNameProviderInstanceProvider
{
    public function __construct(ClassNameProvider $classNameProvider, Container $container)
    {
        parent::__construct($classNameProvider, $container);
    }

    public function getTypedValueByKey(string $entityName): PermissionsProviderInterface
    {
        return $this->getValueByKey($entityName);
    }
}
