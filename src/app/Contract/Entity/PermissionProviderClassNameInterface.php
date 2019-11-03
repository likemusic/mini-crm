<?php

namespace App\Contract\Entity;

use App\Entity\Counteragent\PermissionsProvider as CounteragentPermissionsProvider;
use App\Entity\Currency\PermissionsProvider as CurrencyPermissionsProvider;
use App\Entity\DiscountedProduct\PermissionsProvider as DiscountedProductPermissionsProvider;
use App\Entity\ExchangeRate\PermissionsProvider as ExchangeRatePermissionsProvider;
use App\Entity\MoneyChange\PermissionsProvider as MoneyChangePermissionsProvider;
use App\Entity\Order\PermissionsProvider as OrderPermissionsProvider;
//use App\Entity\Pharmacy\PermissionsProvider as PharmacyPermissionsProvider;
use App\Entity\Product\PermissionsProvider as ProductPermissionsProvider;
use App\Entity\ProductCategory\PermissionsProvider as ProductCategoryPermissionsProvider;
use App\Entity\Role\PermissionsProvider as RolePermissionsProvider;
use App\Entity\Warehouse\PermissionsProvider as WarehousePermissionsProvider;
use App\Entity\User\PermissionsProvider as UserPermissionsProvider;
use App\Entity\Settings\PermissionsProvider as SettingsPermissionsProvider;

interface PermissionProviderClassNameInterface
{
    const COUNTERAGENT = CounteragentPermissionsProvider::class;
    const CURRENCY = CurrencyPermissionsProvider::class;
    const DISCOUNTED_PRODUCT = DiscountedProductPermissionsProvider::class;
    const EXCHANGE_RATE = ExchangeRatePermissionsProvider::class;
    const MONEY_CHANGE = MoneyChangePermissionsProvider::class;
//    const MONEY_TRANSFER = 'money-transfer';
    const ORDER = OrderPermissionsProvider::class;
//    const ORDER_ITEM = 'order-item';
//    const PHARMACY = PharmacyPermissionsProvider::class;

    const PRODUCT = ProductPermissionsProvider::class;
    const PRODUCT_CATEGORY = ProductCategoryPermissionsProvider::class;
    const ROLE = RolePermissionsProvider::class;
    const WAREHOUSE = WarehousePermissionsProvider::class;
    const USER = UserPermissionsProvider::class;
    const SETTINGS = SettingsPermissionsProvider::class;
}
