<?php

namespace App\Contract\MainMenu\Root;

use App\Menu\Main\Root\UsersAndRoles\RenderedItem as UsersAndRolesRenderedItem;
use App\Menu\Main\Root\ProductCatalog\RenderedItem as ProductCatalogRenderedItem;
use App\Menu\Main\Root\CurrenciesAndExchangeRates\RenderedItem as CurrenciesAndExchangeRatesRenderedItem;
use App\Menu\Main\Root\Other\RenderedItem as OtherRenderedItem;

interface ItemDataClassNameInterface
{
    const USERS_AND_ROLES = UsersAndRolesRenderedItem::class;
    const PRODUCT_CATALOG = ProductCatalogRenderedItem::class;
    const CURRENCIES_AND_EXCHANGE_RATES = CurrenciesAndExchangeRatesRenderedItem::class;
    const OTHER = OtherRenderedItem::class;
}
