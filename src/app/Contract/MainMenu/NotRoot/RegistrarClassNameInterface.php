<?php


namespace App\Contract\MainMenu\NotRoot;

use App\Entity\Product\MainMenu\Registrar as ProductMainMenuRegistrar;
use App\Entity\ProductCategory\MainMenu\Registrar as ProductCategoryMainMenuRegistrar;
use App\Entity\User\MainMenu\Registrar as UserMainMenuRegistrar;
use App\Entity\Role\MainMenu\Registrar as RoleMainMenuRegistrar;
use App\Entity\Currency\MainMenu\Registrar as CurrencyMainMenuRegistrar;

interface RegistrarClassNameInterface
{
    const PRODUCTS = ProductMainMenuRegistrar::class;
    const CATEGORIES = ProductCategoryMainMenuRegistrar::class;
    const USERS = UserMainMenuRegistrar::class;
    const ROLES = RoleMainMenuRegistrar::class;
    const CURRENCIES = CurrencyMainMenuRegistrar::class;
}
