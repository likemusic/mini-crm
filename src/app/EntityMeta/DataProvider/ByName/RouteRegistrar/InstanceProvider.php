<?php

namespace App\EntityMeta\DataProvider\ByName\RouteRegistrar;

use App\Base\DataProvider\ByClassNameProviderInstanceProvider;
use App\Contract\Entity\Base\Route\RegistrarInterface;
use Illuminate\Contracts\Container\Container;


class InstanceProvider extends ByClassNameProviderInstanceProvider
{
    public function __construct(ClassNameProvider $classNameProvider, Container $container)
    {
        parent::__construct($classNameProvider, $container);
    }

    public function getTypedValueByKey(string $entityName): RegistrarInterface
    {
        return $this->getValueByKey($entityName);
    }
}
