<?php

namespace App\Contract\MainMenu\Permission;

use App\Contract\Entity\Permission\ListNameInterface as CrmListPermissionInterface;
use App\Contract\Entity\Permission\Menu\Main\NameInterface as MainMenuPermissionNameInterface;

interface ToCrmPermissionMapInterface
{
    const MAP = [
        MainMenuPermissionNameInterface::PRODUCT_CATALOG => [
            CrmListPermissionInterface::PRODUCT,
            CrmListPermissionInterface::PRODUCT_CATEGORY,
        ],
        MainMenuPermissionNameInterface::USERS_AND_ROLES => [
            CrmListPermissionInterface::USER,
            CrmListPermissionInterface::ROLE,
        ]
    ];
}
