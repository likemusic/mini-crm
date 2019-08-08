<?php

declare(strict_types=1);

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use App\Contract\Route\Name\ProductInterface;
use App\Contract\Route\Name\PlatformInterface;

//Screens

// Platform > System > Users
Breadcrumbs::for('platform.systems.users', function ($trail) {
    $trail->parent('platform.systems.index');
    $trail->push(__('Users'), route('platform.systems.users'));
});

// Platform > System > Users > User
Breadcrumbs::for('platform.systems.users.edit', function ($trail, $user) {
    $trail->parent('platform.systems.users');
    $trail->push(__('Edit'), route('platform.systems.users.edit', $user));
});

// Platform > System > Roles
Breadcrumbs::for('platform.systems.roles', function ($trail) {
    $trail->parent('platform.systems.index');
    $trail->push(__('Roles'), route('platform.systems.roles'));
});

// Platform > System > Roles > Create
Breadcrumbs::for('platform.systems.roles.create', function ($trail) {
    $trail->parent('platform.systems.roles');
    $trail->push(__('Create'), route('platform.systems.roles.create'));
});

// Platform > System > Roles > Role
Breadcrumbs::for('platform.systems.roles.edit', function ($trail, $role) {
    $trail->parent('platform.systems.roles');
    $trail->push(__('Role'), route('platform.systems.roles.edit', $role));
});

// Platform -> Example
Breadcrumbs::for('platform.example', function ($trail) {
    $trail->parent(PlatformInterface::INDEX);
    $trail->push(__('Example'));
});

Breadcrumbs::for('platform.email', function ($trail) {
    $trail->parent(PlatformInterface::INDEX);
    $trail->push('Email sender');
});

// Platfort > Product
Breadcrumbs::for(ProductInterface::NEW, function ($trail) {
    $trail->parent(ProductInterface::LIST);
    $trail->push('Создание товара');
});

Breadcrumbs::for(ProductInterface::EDIT, function ($trail) {
    $trail->parent(ProductInterface::LIST);
    $trail->push('Обновление товара');
});

Breadcrumbs::for(ProductInterface::LIST, function ($trail) {
    $trail->parent(PlatformInterface::INDEX);
    $trail->push('Товары');
});
