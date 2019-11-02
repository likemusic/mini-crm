<?php

namespace App\Menu\Main\Root;

use App\Contract\MainMenu\Root\ItemDataClassNameInterface;
use App\Contract\MainMenu\Root\NameInterface as NotRootNameInterface;
use App\Menu\Main\Base\RenderedItemProvider as BaseRenderedItemProvider;
use Illuminate\Contracts\Container\Container;

class RenderedItemProvider extends BaseRenderedItemProvider
{
    protected function getNameToClassNameMap(): array
    {
        return [
            NotRootNameInterface::PRODUCT_CATALOG => ItemDataClassNameInterface::PRODUCT_CATALOG,
            NotRootNameInterface::USERS_AND_ROLES => ItemDataClassNameInterface::USERS_AND_ROLES,
            NotRootNameInterface::CURRENCIES_AND_EXCHANGE_RATES => ItemDataClassNameInterface::CURRENCIES_AND_EXCHANGE_RATES,
        ];
    }
}
