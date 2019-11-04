<?php

namespace App\Menu\Main\NotRoot;

use App\Contract\MainMenu\NotRoot\NameInterface as NotRootNameInterface;
use App\Contract\MainMenu\NotRoot\ItemDataClassNameInterface;
use Illuminate\Contracts\Container\Container;
use App\Menu\Main\Base\RenderedItemProvider as BaseRenderedItemProvider;

class RenderedItemProvider extends BaseRenderedItemProvider
{
    protected function getNameToClassNameMap(): array
    {
        return [
            NotRootNameInterface::PRODUCTS => ItemDataClassNameInterface::PRODUCTS,
            NotRootNameInterface::CATEGORIES => ItemDataClassNameInterface::CATEGORIES,
            NotRootNameInterface::USERS => ItemDataClassNameInterface::USERS,
            NotRootNameInterface::ROLES => ItemDataClassNameInterface::ROLES,
            NotRootNameInterface::CURRENCIES => ItemDataClassNameInterface::CURRENCIES,
            NotRootNameInterface::SETTINGS => ItemDataClassNameInterface::SETTINGS,
        ];
    }
}
