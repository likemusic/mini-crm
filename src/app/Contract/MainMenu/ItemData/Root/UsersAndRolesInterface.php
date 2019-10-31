<?php

namespace App\Contract\MainMenu\ItemData\Root;

use App\Contract\Common\IconNameInterface;
use App\Contract\Entity\Permission\Menu\Main\NameInterface as MainMenuPermissionNameInterface;

interface UsersAndRolesInterface
{
    const PERMISSION = MainMenuPermissionNameInterface::USERS_AND_ROLES;
    const ICON = IconNameInterface::LOCK;
    const LABEL = 'Пользователи и роли';
    const SLUG = 'users-and-roles';
}
