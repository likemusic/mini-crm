<?php

namespace App\MainMenu\Root\ProductCatalog;

use App\Contract\MainMenu\ItemData\Root\ProductCatalogInterface as ItemDataInterface;
use App\MainMenu\Root\Base\ItemData as BaseItemData;

class ItemData extends BaseItemData
{
    public function __construct()
    {
        parent::__construct(
            ItemDataInterface::PERMISSION,
            ItemDataInterface::ICON,
            ItemDataInterface::LABEL,
            ItemDataInterface::SLUG
        );
    }
}
