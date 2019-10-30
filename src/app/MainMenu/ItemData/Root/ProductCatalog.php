<?php

namespace App\MainMenu\ItemData\Root;

use App\Contract\MainMenu\ItemData\Root\ProductCatalog as ItemDataInterface;

class ProductCatalog extends Base
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
