<?php

namespace App\Menu\Main\Base;

use App\Contract\MainMenu\NotRoot\NameInterface as NotRootNameInterface;
use App\Contract\MainMenu\NotRoot\ItemDataClassNameInterface;
use Illuminate\Contracts\Container\Container;

abstract class RenderedItemProvider
{
    private $nameToClassNameMap = [
        NotRootNameInterface::PRODUCTS => ItemDataClassNameInterface::PRODUCTS,
        NotRootNameInterface::CATEGORIES => ItemDataClassNameInterface::CATEGORIES,
        NotRootNameInterface::USERS => ItemDataClassNameInterface::USERS,
        NotRootNameInterface::ROLES => ItemDataClassNameInterface::ROLES,
        NotRootNameInterface::CURRENCIES => ItemDataClassNameInterface::CURRENCIES,
    ];

    /** @var Container */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getRenderedItemByName($notRootItemName)
    {
        $className = $this->getClassNameByName($notRootItemName);

        return $this->getInstanceByClassName($className);
    }

    private function getInstanceByClassName(string $className)
    {
        return $this->container->get($className);
    }

    private function getClassNameByName(string $notRootItemName)
    {
        $classNameMap = $this->getNameToClassNameMap();

        if (!array_key_exists($notRootItemName, $classNameMap)) {
            throw new \InvalidArgumentException('Invalid item name: ' . $notRootItemName);
        }

        return $classNameMap[$notRootItemName];
    }

    abstract protected function getNameToClassNameMap(): array;
}
