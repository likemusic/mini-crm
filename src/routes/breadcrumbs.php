<?php

declare(strict_types=1);

use App\Contract\Entity\Platform\Route\PlatformRouteNameInterface;
use App\Entity\DiscountedProduct\BreadcrumbsRegistrar as DiscountedProductBreadcrumbsRegistrar;
use App\Entity\Product\BreadcrumbsRegistrar as ProductBreadcrumbsRegistrar;
use App\Entity\Product\Route\NameProvider as ProductRouteNameProvider;
use App\Entity\Product\UseVariantProvider as ProductUseVariant;
use App\Entity\ProductQuote\BreadcrumbsRegistrar as ProductQuoteBreadcrumbsRegistrar;
use App\Entity\UnaccountedProduct\BreadcrumbsRegistrar as UnaccountedProductBreadcrumbsRegistrar;
use App\Entity\Warehouse\BreadcrumbsRegistrar as WarehouseBreadcrumbsRegistrar;
use App\Helper\Breadcrumbs as BreadcrumbsHelper;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

//Screens

// Platform > System > Users
Breadcrumbs::for('platform.systems.users', function (BreadcrumbsGenerator $trail) {
    $trail->parent('platform.systems.index');
    $trail->push(__('Users'), route('platform.systems.users'));
});

// Platform > System > Users > User
Breadcrumbs::for('platform.systems.users.edit', function (BreadcrumbsGenerator $trail, $user) {
    $trail->parent('platform.systems.users');
    $trail->push(__('Edit'), route('platform.systems.users.edit', $user));
});

// Platform > System > Roles
Breadcrumbs::for('platform.systems.roles', function (BreadcrumbsGenerator $trail) {
    $trail->parent('platform.systems.index');
    $trail->push(__('Roles'), route('platform.systems.roles'));
});

// Platform > System > Roles > Create
Breadcrumbs::for('platform.systems.roles.create', function (BreadcrumbsGenerator $trail) {
    $trail->parent('platform.systems.roles');
    $trail->push(__('Create'), route('platform.systems.roles.create'));
});

// Platform > System > Roles > Role
Breadcrumbs::for('platform.systems.roles.edit', function (BreadcrumbsGenerator $trail, $role) {
    $trail->parent('platform.systems.roles');
    $trail->push(__('Role'), route('platform.systems.roles.edit', $role));
});

// Platform -> Example
Breadcrumbs::for('platform.example', function (BreadcrumbsGenerator $trail) {
    $trail->parent(PlatformRouteNameInterface::INDEX);
    $trail->push(__('Example'));
});

Breadcrumbs::for('platform.email', function (BreadcrumbsGenerator $trail) {
    $trail->parent(PlatformRouteNameInterface::INDEX);
    $trail->push('Email sender');
});

/** @var BreadcrumbsHelper $breadcrumbsHelper */
$breadcrumbsHelper = App::make(BreadcrumbsHelper::class);

/** @var ProductUseVariant $productUseVariant */
$productUseVariant = App::make(ProductUseVariant::class);

/** @var ProductRouteNameProvider $productRouteNameProvider */
$productRouteNameProvider = App::make(ProductRouteNameProvider::class);

// Platform > Product
/** @var ProductBreadcrumbsRegistrar $productBreadcrumbsRegistrar */
$productBreadcrumbsRegistrar = App::make(ProductBreadcrumbsRegistrar::class);
$productBreadcrumbsRegistrar->register();

// Platform > Warehouse
/** @var WarehouseBreadcrumbsRegistrar $warehouseBreadcrumbsRegistrar */
$warehouseBreadcrumbsRegistrar = App::make(WarehouseBreadcrumbsRegistrar::class);
$warehouseBreadcrumbsRegistrar->register();

// Platform > UnaccountedProduct
/** @var UnaccountedProductBreadcrumbsRegistrar $unaccountedProductBreadcrumbsRegistrar */
$unaccountedProductBreadcrumbsRegistrar = App::make(UnaccountedProductBreadcrumbsRegistrar::class);
$unaccountedProductBreadcrumbsRegistrar->register();

// Platform > DiscountedProduct
/** @var DiscountedProductBreadcrumbsRegistrar $discountedProductBreadcrumbsRegistrar */
$discountedProductBreadcrumbsRegistrar = App::make(DiscountedProductBreadcrumbsRegistrar::class);
$discountedProductBreadcrumbsRegistrar->register();

// Platform > ProductQuote
/** @var ProductQuoteBreadcrumbsRegistrar $productQuoteBreadcrumbsRegistrar */
$productQuoteBreadcrumbsRegistrar = App::make(ProductQuoteBreadcrumbsRegistrar::class);
$productQuoteBreadcrumbsRegistrar->register();
