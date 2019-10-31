<?php

namespace App\Contract\MainMenu\ItemData\Root;

use App\Contract\Common\IconNameInterface;
use App\Contract\Entity\Permission\Menu\Main\NameInterface as MainMenuPermissionNameInterface;

interface ProductCatalogInterface
{
    const PERMISSION = MainMenuPermissionNameInterface::PRODUCT_CATALOG;
    const ICON = IconNameInterface::BOOK_OPEN;
    const LABEL = 'Каталог товаров';
    const SLUG = 'product-catalog';
}
