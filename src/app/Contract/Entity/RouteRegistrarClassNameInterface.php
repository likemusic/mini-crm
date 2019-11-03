<?php

namespace App\Contract\Entity;

use App\Entity\Counteragent\Route\CrudRegistrar as CounteragentCrudRouteRegistrar;
use App\Entity\Currency\Route\CrudRegistrar as CurrencyCrudRouteRegistrar;
//use App\Entity\DicsountedProduct\Route\CrudRegistrar as DicsountedProductCrudRouteRegistrar;
use App\Entity\ExchangeRate\Route\CrudRegistrar as ExchangeRateCrudRouteRegistrar;
//use App\Entity\MoneyChange\Route\CrudRegistrar as MoneyChangeCrudRouteRegistrar;
//use App\Entity\MoneyTransfer\Route\CrudRegistrar as MoneyTransferCrudRouteRegistrar;
use App\Entity\Order\Route\CrudRegistrar as OrderCrudRouteRegistrar;
//use App\Entity\Pharmacy\Route\CrudRegistrar as PharmacyCrudRouteRegistrar;
use App\Entity\Product\Route\CrudRegistrar as ProductCrudRouteRegistrar;
use App\Entity\ProductCategory\Route\CrudRegistrar as ProductCategoryCrudRouteRegistrar;
use App\Entity\Role\Route\CrudRegistrar as RoleCrudRouteRegistrar;
use App\Entity\User\Route\CrudRegistrar as UserCrudRouteRegistrar;
use App\Entity\Warehouse\Route\CrudRegistrar as WarehouseCrudRouteRegistrar;
use App\Entity\Wallet\Route\CrudRegistrar as WalletCrudRouteRegistrar;
use App\Entity\Settings\Route\ListEditRegistrar as SettingsListEditRouteRegistrar;

interface RouteRegistrarClassNameInterface
{
    const COUNTERAGENT = CounteragentCrudRouteRegistrar::class;
    const CURRENCY = CurrencyCrudRouteRegistrar::class;
//    const DISCOUNTED_PRODUCT = DicsountedProductCrudRouteRegistrar::class;
    const EXCHANGE_RATE = ExchangeRateCrudRouteRegistrar::class;
//    const MONEY_CHANGE = MoneyChangeCrudRouteRegistrar::class;
//    const MONEY_TRANSFER = MoneyTransferCrudRouteRegistrar::class;
    const ORDER = OrderCrudRouteRegistrar::class;
//    const PHARMACY = PharmacyCrudRouteRegistrar::class;

    const PRODUCT = ProductCrudRouteRegistrar::class;
    const PRODUCT_CATEGORY = ProductCategoryCrudRouteRegistrar::class;
    const ROLE = RoleCrudRouteRegistrar::class;
    const USER = UserCrudRouteRegistrar::class;
    const WAREHOUSE = WarehouseCrudRouteRegistrar::class;
    const WALLET = WalletCrudRouteRegistrar::class;

    const SETTINGS = SettingsListEditRouteRegistrar::class;
}
