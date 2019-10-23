<?php

declare(strict_types=1);

use App\Contract\Entity\Platform\Route\NameInterface as PlatformRouteNameInterface;
use App\Contract\Entity\Platform\Route\Systems\NameInterface as PlatformSystemRouteNameInterface;
use App\Entity\Counteragent\Route\EditableRegistrar as CounteragentRouteRegistrar;
use App\Entity\Currency\Route\EditableRegistrar as CurrencyRouteRegistrar;
use App\Entity\DiscountedProduct\Route\EditableRegistrar as DiscountedProductRouteRegistrar;
use App\Entity\ExchangeRate\Route\EditableRegistrar as ExchangeRateRouteRegistrar;
use App\Entity\Order\Route\EditableRegistrar as OrderRouteRegistrar;
use App\Entity\OrderItem\Route\EditableRegistrar as OrderItemRouteRegistrar;
use App\Entity\Pharmacy\Route\NotEditableRegistrar as PharmacyRouteRegistrar;
use App\Entity\Product\Route\EditableRegistrar as ProductRouteRegistrar;
use App\Entity\ProductCategory\Route\EditableRegistrar as ProductCategoryRouteRegistrar;
use App\Entity\Role\Route\EditableRegistrar as RoleRouteRegistrar;
use App\Entity\StockItem\Route\EditableRegistrar as StockItemRouteRegistrar;
use App\Entity\UnaccountedProduct\Route\EditableRegistrar as UnaccountedProductRouteRegistrar;
use App\Entity\User\Route\EditableRegistrar as UserRouteRegistrar;
use App\Entity\Wallet\Route\EditableRegistrar as WalletRouteRegistrar;
use App\Entity\Warehouse\Route\EditableRegistrar as WarehouseRouteRegistrar;
use App\Http\Controllers\Orchid\Patform\RelationWithDataController;
use App\Orchid\Screens\PlatformScreen;
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

// RelationWithData
$this->router->post('relation-with-data', [RelationWithDataController::class, 'view'])
    ->name(PlatformSystemRouteNameInterface::RELATION_WITH_DATA);

// Main
$this->router->screen('/main', PlatformScreen::class)->name(PlatformRouteNameInterface::MAIN);

// Roles
/** @var RoleRouteRegistrar $userRouteRegistrar */
$roleRouteRegistrar = App::make(RoleRouteRegistrar::class);
$roleRouteRegistrar->registerRoutes($this->router);

// Users
/** @var UserRouteRegistrar $userRouteRegistrar */
$userRouteRegistrar = App::make(UserRouteRegistrar::class);
$userRouteRegistrar->registerRoutes($this->router);

// Product Category
/** @var ProductCategoryRouteRegistrar $productCategoryRouteRegistrar */
$productCategoryRouteRegistrar = App::make(ProductCategoryRouteRegistrar::class);
$productCategoryRouteRegistrar->registerRoutes($this->router);

// Product
/** @var ProductRouteRegistrar $productRouteRegistrar */
$productRouteRegistrar = App::make(ProductRouteRegistrar::class);
$productRouteRegistrar->registerRoutes($this->router);

/** @var PharmacyRouteRegistrar $pharmacyRouteRegistrar */
//$pharmacyRouteRegistrar = App::make(PharmacyRouteRegistrar::class);
//$pharmacyRouteRegistrar->registerRoutes($this->router);


/** @var WarehouseRouteRegistrar $warehouseRouteRegistrar */
//$warehouseRouteRegistrar = App::make(WarehouseRouteRegistrar::class);
//$warehouseRouteRegistrar->registerRoutes($this->router);

/** @var StockItemRouteRegistrar $stockItemRouteRegistrar */
//$stockItemRouteRegistrar = App::make(StockItemRouteRegistrar::class);
//$stockItemRouteRegistrar->registerRoutes($this->router);

/** @var UnaccountedProductRouteRegistrar $unaccountedProductRouteRegistrar */
//$unaccountedProductRouteRegistrar = App::make(UnaccountedProductRouteRegistrar::class);
//$unaccountedProductRouteRegistrar->registerRoutes($this->router);

/** @var DiscountedProductRouteRegistrar $discountedProductRouteRegistrar */
//$discountedProductRouteRegistrar = App::make(DiscountedProductRouteRegistrar::class);
//$discountedProductRouteRegistrar->registerRoutes($this->router);

/** @var ProductRouteRegistrar $productRouteRegistrar */
//$productQuoteRouteRegistrar = App::make(ProductQuoteRouteRegistrar::class);
//$productQuoteRouteRegistrar->registerRoutes($this->router);

/** @var OrderItemRouteRegistrar $orderItemRouteRegistrar */
//$orderItemRouteRegistrar = App::make(OrderItemRouteRegistrar::class);
//$orderItemRouteRegistrar->registerRoutes($this->router);

/** @var OrderRouteRegistrar $orderRouteRegistrar */
//$orderRouteRegistrar = App::make(OrderRouteRegistrar::class);
//$orderRouteRegistrar->registerRoutes($this->router);

/** @var CounteragentRouteRegistrar $counteragentRouteRegistrar */
//$counteragentRouteRegistrar = App::make(CounteragentRouteRegistrar::class);
//$counteragentRouteRegistrar->registerRoutes($this->router);

/** @var CurrencyRouteRegistrar $currencyRouteRegistrar */
//$currencyRouteRegistrar = App::make(CurrencyRouteRegistrar::class);
//$currencyRouteRegistrar->registerRoutes($this->router);

/** @var WalletRouteRegistrar $walletRouteRegistrar */
//$walletRouteRegistrar = App::make(WalletRouteRegistrar::class);
//$walletRouteRegistrar->registerRoutes($this->router);

/** @var ExchangeRateRouteRegistrar $exchangeRateRouteRegistrar */
//$exchangeRateRouteRegistrar = App::make(ExchangeRateRouteRegistrar::class);
//$exchangeRateRouteRegistrar->registerRoutes($this->router);
