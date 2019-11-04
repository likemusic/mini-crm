<?php

namespace App\Contract\MainMenu\NotRoot;

use App\Entity\Product\MainMenu\ItemData as ProductItemData;
use App\Entity\ProductCategory\MainMenu\ItemData as ProductCategoryItemData;
use App\Entity\User\MainMenu\ItemData as UserItemData;
use App\Entity\Role\MainMenu\ItemData as RoleItemData;
use App\Entity\Currency\MainMenu\ItemData as CurrencyItemData;
use App\Entity\Settings\MainMenu\ItemData as SettingsItemData;

interface ItemDataClassNameInterface
{
    const PRODUCTS = ProductItemData::class;
    const CATEGORIES = ProductCategoryItemData::class;
    const USERS = UserItemData::class;
    const ROLES = RoleItemData::class;
    const CURRENCIES = CurrencyItemData::class;
    const SETTINGS = SettingsItemData::class;
}
