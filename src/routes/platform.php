<?php

declare(strict_types=1);

use App\Entity\Product\Route\NameProvider as ProductRouteNameProvider;
use App\Entity\Product\Route\PathProvider as ProductRoutePathProvider;
use App\Helper\RouteRegisterHelper;
use App\Orchid\Screens\EmailSenderScreen;
use App\Orchid\Screens\ExampleScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Product\EditScreen as ProductEditScreen;
use App\Orchid\Screens\Product\ListScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;

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


/** @var ProductRouteNameProvider $productRouteNameProvider */
$productRouteNameProvider = App::make(ProductRouteNameProvider::class);
/** @var ProductRoutePathProvider $productRoutePathProvider */
$productRoutePathProvider = App::make(ProductRoutePathProvider::class);

// Product
$this->router
    ->screen($productRoutePathProvider->getNew(), ProductEditScreen::class)
    ->name($productRouteNameProvider->getNew());

$this->router
    ->screen($productRoutePathProvider->getEdit(), ProductEditScreen::class)
    ->name($productRouteNameProvider->getEdit());

$this->router
    ->screen($productRoutePathProvider->getList(), ListScreen::class)
    ->name($productRouteNameProvider->getList());

/** @var RouteRegisterHelper $routeRegisterHelper */
$routeRegisterHelper = App::make(RouteRegisterHelper::class);
$routeRegisterHelper->addRoutes($productRoutePathProvider, $productRouteNameProvider, ProductEditScreen::class);
