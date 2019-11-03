<?php

namespace App\Contract\Entity\PermissionGroup\CRM;

use App\Contract\Entity\PermissionGroup\LabelInterface as PermissionGroupLabelInterface;
use App\Contract\Entity\LabelInterface as EntityLabelInterface;

interface LabelInterface
{
    const PRODUCT = PermissionGroupLabelInterface::CRM . ' > ' . EntityLabelInterface::PRODUCT;
    const PRODUCT_CATEGORY = PermissionGroupLabelInterface::CRM . ' > ' . EntityLabelInterface::PRODUCT_CATEGORY;
    const USER = PermissionGroupLabelInterface::CRM . ' > ' . EntityLabelInterface::USER;
    const ROLE = PermissionGroupLabelInterface::CRM . ' > ' . EntityLabelInterface::ROLE;
    const CURRENCY = PermissionGroupLabelInterface::CRM .' > ' . EntityLabelInterface::CURRENCY;

    const SETTINGS = PermissionGroupLabelInterface::CRM .' > ' . EntityLabelInterface::SETTINGS;
}
