<?php

namespace App\Menu\Main\Root;

use App\Contract\MainMenu\RegistrarInterface;

class ItemNameByMenuRegistrarProvider
{
    private $itemNameByMenuRegistrarClassNameProvider;

    public function __construct(ItemNameByMenuRegistrarClassNameProvider $itemNameByMenuRegistrarClassNameProvider)
    {
        $this->itemNameByMenuRegistrarClassNameProvider = $itemNameByMenuRegistrarClassNameProvider;
    }

    public function getItemNameByMenuRegistrar(RegistrarInterface $menuRegistrar)
    {
        $className = get_class($menuRegistrar);

        return $this->getItemNameByMenuRegistrarClassName($className);
    }

    private function getItemNameByMenuRegistrarClassName(string $className)
    {
        return $this->itemNameByMenuRegistrarClassNameProvider->getItemNameByMenuRegistrarClassName($className);
    }
}
