<?php

namespace App\Menu\Main\Base;

use App\Contract\MainMenu\RegistrarInterface;
use Illuminate\Container\Container;
use InvalidArgumentException;

abstract class MenuRegistrarProvider
{
    /** @var Container */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getRegistrarProviderByMenuItemName(string $menuItemName): RegistrarInterface
    {
        $registrarClassName = $this->getRegistrarClassNameByMenuItemName($menuItemName);

        return $this->getInstance($registrarClassName);
    }

    abstract protected function getMap(): array;

    private function getRegistrarClassNameByMenuItemName(string $rootMenuItemName): string
    {
        $map = $this->getMap();

        if (!array_key_exists($rootMenuItemName, $map)) {
            throw new InvalidArgumentException('Invalid root menu item name: ' . $rootMenuItemName);
        }

        return $map[$rootMenuItemName];
    }

    private function getInstance($className)
    {
        return $this->container->get($className);
    }
}
