<?php

namespace App\EntityMeta\DataProvider\ByName\Route;

use App\Base\DataProvider\ByInstanceProviderMethodValueProvider;
use App\Contract\Entity\Base\NamesProviderInterface\MethodNameInterface;
use App\EntityMeta\DataProvider\ByName\NameProvider\InstanceProvider as NameProviderProvider;

class PlaceholderProvider extends ByInstanceProviderMethodValueProvider
{
    public function __construct(NameProviderProvider $instanceProvider)
    {
        parent::__construct($instanceProvider);
    }

    protected function getMethodName(): string
    {
        return MethodNameInterface::GET_ROUTE_PLACEHOLDER;
    }

    public function getTypedValueByKey(string $key): string
    {
        return $this->getValueByKey($key);
    }
}
