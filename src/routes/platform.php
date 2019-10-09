<?php

declare(strict_types=1);

use App\Entity\DiscountedProduct\Route\EditableRegistrar as DiscountedProductRouteRegistrar;
use App\Entity\Pharmacy\Route\NotEditableRegistrar as PharmacyRouteRegistrar;
use App\Entity\Product\Route\EditableRegistrar as ProductRouteRegistrar;
use App\Entity\ProductCategory\Route\EditableRegistrar as ProductCategoryRouteRegistrar;
use App\Entity\UnaccountedProduct\Route\EditableRegistrar as UnaccountedProductRouteRegistrar;
use App\Entity\Warehouse\Route\EditableRegistrar as WarehouseRouteRegistrar;
use App\Entity\StockItem\Route\EditableRegistrar as StockItemRouteRegistrar;
use App\Entity\ProductQuote\Route\EditableRegistrar as ProductQuoteRouteRegistrar;
use App\Entity\OrderItem\Route\EditableRegistrar as OrderItemRouteRegistrar;
use App\Entity\Order\Route\EditableRegistrar as OrderRouteRegistrar;
use App\Entity\Counteragent\Route\EditableRegistrar as CounteragentRouteRegistrar;
use App\Entity\Currency\Route\EditableRegistrar as CurrencyRouteRegistrar;
use App\Entity\Wallet\Route\EditableRegistrar as WalletRouteRegistrar;
use App\Entity\ExchangeRate\Route\EditableRegistrar as ExchangeRateRouteRegistrar;

use App\Orchid\Screens\EmailSenderScreen;
use App\Orchid\Screens\ExampleScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use Illuminate\Routing\RouteFileRegistrar;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

/** @var RouteFileRegistrar $this */

// Main
$this->router->screen('/main', PlatformScreen::class)->name('platform.main');

// Users...
$this->router->screen('users/{users}/edit', UserEditScreen::class)->name('platform.systems.users.edit');
$this->router->screen('users', UserListScreen::class)->name('platform.systems.users');

// Roles...
$this->router->screen('roles/{roles}/edit', RoleEditScreen::class)->name('platform.systems.roles.edit');
$this->router->screen('roles/create', RoleEditScreen::class)->name('platform.systems.roles.create');
$this->router->screen('roles', RoleListScreen::class)->name('platform.systems.roles');

// Example...
$this->router->screen('example', ExampleScreen::class)->name('platform.example');
//Route::screen('/dashboard/screen/idea', 'Idea::class','platform.screens.idea');

$this->router->screen('email', EmailSenderScreen::class)->name('platform.email');

/** @var PharmacyRouteRegistrar $pharmacyRouteRegistrar */
$pharmacyRouteRegistrar = App::make(PharmacyRouteRegistrar::class);
$pharmacyRouteRegistrar->registerRoutes($this->router);

/** @var ProductRouteRegistrar $productRouteRegistrar */
$productRouteRegistrar = App::make(ProductRouteRegistrar::class);
$productRouteRegistrar->registerRoutes($this->router);

/** @var ProductRouteRegistrar $productRouteRegistrar */
$productCategoryRouteRegistrar = App::make(ProductCategoryRouteRegistrar::class);
$productCategoryRouteRegistrar->registerRoutes($this->router);

/** @var WarehouseRouteRegistrar $warehouseRouteRegistrar */
$warehouseRouteRegistrar = App::make(WarehouseRouteRegistrar::class);
$warehouseRouteRegistrar->registerRoutes($this->router);

/** @var StockItemRouteRegistrar $stockItemRouteRegistrar */
$stockItemRouteRegistrar = App::make(StockItemRouteRegistrar::class);
$stockItemRouteRegistrar->registerRoutes($this->router);

/** @var UnaccountedProductRouteRegistrar $unaccountedProductRouteRegistrar */
$unaccountedProductRouteRegistrar = App::make(UnaccountedProductRouteRegistrar::class);
$unaccountedProductRouteRegistrar->registerRoutes($this->router);

/** @var DiscountedProductRouteRegistrar $discountedProductRouteRegistrar */
$discountedProductRouteRegistrar = App::make(DiscountedProductRouteRegistrar::class);
$discountedProductRouteRegistrar->registerRoutes($this->router);

/** @var ProductRouteRegistrar $productRouteRegistrar */
$productQuoteRouteRegistrar = App::make(ProductQuoteRouteRegistrar::class);
$productQuoteRouteRegistrar->registerRoutes($this->router);

/** @var OrderItemRouteRegistrar $orderItemRouteRegistrar */
$orderItemRouteRegistrar = App::make(OrderItemRouteRegistrar::class);
$orderItemRouteRegistrar->registerRoutes($this->router);

/** @var OrderRouteRegistrar $orderRouteRegistrar */
$orderRouteRegistrar = App::make(OrderRouteRegistrar::class);
$orderRouteRegistrar->registerRoutes($this->router);

/** @var CounteragentRouteRegistrar $counteragentRouteRegistrar */
$counteragentRouteRegistrar = App::make(CounteragentRouteRegistrar::class);
$counteragentRouteRegistrar->registerRoutes($this->router);

/** @var CurrencyRouteRegistrar $currencyRouteRegistrar */
$currencyRouteRegistrar = App::make(CurrencyRouteRegistrar::class);
$currencyRouteRegistrar->registerRoutes($this->router);

/** @var WalletRouteRegistrar $walletRouteRegistrar */
$walletRouteRegistrar = App::make(WalletRouteRegistrar::class);
$walletRouteRegistrar->registerRoutes($this->router);

/** @var ExchangeRateRouteRegistrar $exchangeRateRouteRegistrar */
$exchangeRateRouteRegistrar = App::make(ExchangeRateRouteRegistrar::class);
$exchangeRateRouteRegistrar->registerRoutes($this->router);
