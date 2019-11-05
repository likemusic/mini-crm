<?php

namespace App\EntityMeta\DataProvider\ByName\NameProvider;

use App\Base\DataProvider\ByClassNameProviderInstanceProvider;
use App\Contract\Entity\Base\NamesProviderInterface;
use Illuminate\Contracts\Container\Container;

class InstanceProvider extends ByClassNameProviderInstanceProvider
{
    public function __construct(ClassNameProvider $classNameProvider, Container $container)
    {
        parent::__construct($classNameProvider, $container);
    }

    public function getTypedValueByKey(string $entityName): NamesProviderInterface
    {
        return $this->getValueByKey($entityName);
    }
}
