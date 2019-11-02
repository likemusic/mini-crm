<?php

namespace App\Contract\MainMenu\ItemData\Root;

use App\Contract\Common\IconNameInterface;
use App\Contract\MainMenu\Root\PermissionNameInterface as MainMenuPermissionNameInterface;

interface ProductCatalogInterface
{
    const PERMISSION = MainMenuPermissionNameInterface::PRODUCT_CATALOG;
    const ICON = IconNameInterface::BOOK_OPEN;
    const LABEL = 'Каталог товаров';
    const SLUG = 'product-catalog';
}
