<?php

namespace App\Contract\MainMenu\ItemData\Root;

use App\Contract\Common\IconNameInterface;
use App\Contract\MainMenu\Root\PermissionNameInterface as MainMenuPermissionNameInterface;

interface OtherInterface
{
    const PERMISSION = MainMenuPermissionNameInterface::OTHER;
    const ICON = IconNameInterface::MODULES;
    const LABEL = 'Другое';
    const SLUG = 'other';
}
