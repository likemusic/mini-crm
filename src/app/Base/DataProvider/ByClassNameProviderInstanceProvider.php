<?php

namespace App\Base\DataProvider;

use App\Contract\Base\ClassNameProviderInterface;
use App\Contract\Base\InstanceProviderInterface;
use Illuminate\Contracts\Container\Container;

abstract class ByClassNameProviderInstanceProvider implements InstanceProviderInterface
{
    /**
     * @var Container
     */
    private $container;

    private $classNameProvider;

    public function __construct(
        ClassNameProviderInterface $classNameProvider,
        Container $container
    )
    {
        $this->container = $container;
        $this->classNameProvider = $classNameProvider;
    }

    public function getValueByKey(string $key)
    {
        $className = $this->getClassNameByKey($key);

        return $this->getInstanceByClassName($className);
    }

    private function getClassNameByKey(string $key): string
    {
        return $this->classNameProvider->getValueByKey($key);
    }

    private function getInstanceByClassName(string $className)
    {
        return $this->container->get($className);
    }
}
