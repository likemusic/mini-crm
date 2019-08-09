<?php

declare(strict_types=1);

use App\Contract\Entity\Platform\Route\PlatformRouteNameInterface;
use App\Contract\Entity\Product\Route\NameInterface as ProductRouteNameInterface;
use App\Entity\Product\UseVariant as ProductUseVariant;
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

// Platform > Product
Breadcrumbs::for(ProductRouteNameInterface::NEW, function (BreadcrumbsGenerator $trail) use ($breadcrumbsHelper, $productUseVariant) {
    $trail->parent(ProductRouteNameInterface::LIST);
    $trail->push($breadcrumbsHelper->getCreateName($productUseVariant->getGenitiveName()));
});

Breadcrumbs::for(ProductRouteNameInterface::EDIT, function (BreadcrumbsGenerator $trail) use ($breadcrumbsHelper, $productUseVariant) {
    $trail->parent(ProductRouteNameInterface::LIST);
    $trail->push($breadcrumbsHelper->getUpdateName($productUseVariant->getGenitiveName()));
});

Breadcrumbs::for(ProductRouteNameInterface::LIST, function (BreadcrumbsGenerator $trail) use ($productUseVariant) {
    $trail->parent(PlatformRouteNameInterface::INDEX);
    $trail->push($productUseVariant->getListName());
});
