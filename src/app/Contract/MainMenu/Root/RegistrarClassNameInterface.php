<?php

namespace App\Contract\MainMenu\Root;

use App\Menu\Main\Root\ProductCatalog\Registrar as ProductCatalogRegistrar;
use App\Menu\Main\Root\UsersAndRoles\Registrar as UsersAndRolesRegistrar;
use App\Menu\Main\Root\CurrenciesAndExchangeRates\Registrar as CurrenciesAndExchangeRatesRegistrar;
use App\Menu\Main\Root\Other\Registrar as OtherAndExchangeRatesRegistrar;

interface RegistrarClassNameInterface
{
    const PRODUCT_CATALOG = ProductCatalogRegistrar::class;
    const USERS_AND_ROLES = UsersAndRolesRegistrar::class;
    const CURRENCIES_AND_EXCHANGE_RATES = CurrenciesAndExchangeRatesRegistrar::class;
    const OTHER = OtherAndExchangeRatesRegistrar::class;
}
