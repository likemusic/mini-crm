<?php

namespace App\Base\DataProvider;

use App\Contract\Base\DataProviderInterface;
use App\Contract\Base\InstanceProviderInterface;

abstract class ByInstanceProviderMethodValueProvider implements DataProviderInterface
{
    private $instanceProvider;

    public function __construct(InstanceProviderInterface $instanceProvider)
    {
        $this->instanceProvider = $instanceProvider;
    }

    public function getValueByKey(string $key)
    {
        $instance = $this->getInstanceByKey($key);
        $methodName = $this->getMethodName();

        return $this->callInstanceMethod($instance, $methodName);
    }

    private function getInstanceByKey(string $key)
    {
        return $this->instanceProvider->getValueByKey($key);
    }

    abstract protected function getMethodName(): string;

    private function callInstanceMethod($instance, string $methodName)
    {
        return $instance->{$methodName}();
    }
}
