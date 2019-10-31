<?php

namespace App\Contract\Entity\PermissionGroup\CRM;

use App\Contract\Entity\PermissionGroup\LabelInterface as PermissionGroupLabelInterface;

interface LabelInterface
{
    const PRODUCT = PermissionGroupLabelInterface::CRM . ' > Товар';
    const PRODUCT_CATEGORY = PermissionGroupLabelInterface::CRM . ' > Категория товара';
    const USER = PermissionGroupLabelInterface::CRM . ' > Пользователь';
    const ROLE = PermissionGroupLabelInterface::CRM . ' > Роль пользователя';
    const CURRENCY = PermissionGroupLabelInterface::CRM . ' > Валюта';
}
