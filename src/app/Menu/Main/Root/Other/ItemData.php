<?php

namespace App\Menu\Main\Root\Other;

use App\Contract\MainMenu\ItemData\Root\OtherInterface as ItemDataInterface;
use App\Menu\Main\Root\Base\ItemData as BaseItemData;

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
