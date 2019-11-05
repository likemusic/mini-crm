<?php

namespace App\Contract\Entity;

use App\Entity\Counteragent\NamesProvider as CounteragentNamesProvider;
use App\Entity\Currency\NamesProvider as CurrencyNamesProvider;
use App\Entity\DiscountedProduct\NamesProvider as DiscountedProductNamesProvider;
use App\Entity\ExchangeRate\NamesProvider as ExchangeRateNamesProvider;
use App\Entity\Order\NamesProvider as OrderNamesProvider;
use App\Entity\OrderItem\NamesProvider as OrderItemNamesProvider;
use App\Entity\Pharmacy\NamesProvider as PharmacyNamesProvider;
use App\Entity\Product\NamesProvider as ProductNamesProvider;
use App\Entity\ProductCategory\NamesProvider as ProductCategoryNamesProvider;
use App\Entity\Role\NamesProvider as RoleNamesProvider;
use App\Entity\Settings\NamesProvider as SettingsNamesProvider;
use App\Entity\User\NamesProvider as UserNamesProvider;
use App\Entity\Wallet\NamesProvider as WalletNamesProvider;
use App\Entity\Warehouse\NamesProvider as WarehouseNamesProvider;

//use App\Entity\MoneyChange\NamesProvider as MoneyChangeNamesProvider;
//use App\Entity\MoneyTransfer\NamesProvider as MoneyTransferNamesProvider;

interface NamesProviderInterface
{
    const COUNTERAGENT = CounteragentNamesProvider::class;
    const CURRENCY = CurrencyNamesProvider::class;
    const DISCOUNTED_PRODUCT = DiscountedProductNamesProvider::class;
    const EXCHANGE_RATE = ExchangeRateNamesProvider::class;
//    const MONEY_CHANGE = MoneyChangeNamesProvider::class;
//    const MONEY_TRANSFER = 'money-transfer';
    const ORDER = OrderNamesProvider::class;
    const ORDER_ITEM = OrderItemNamesProvider::class;
    const PHARMACY = PharmacyNamesProvider::class;
    const PRODUCT = ProductNamesProvider::class;
    const PRODUCT_CATEGORY = ProductCategoryNamesProvider::class;
    const ROLE = RoleNamesProvider::class;
    const USER = UserNamesProvider::class;
    const WAREHOUSE = WarehouseNamesProvider::class;
    const WALLET = WalletNamesProvider::class;
    const SETTINGS = SettingsNamesProvider::class;
}
