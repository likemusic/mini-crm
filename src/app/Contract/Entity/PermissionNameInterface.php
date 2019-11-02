<?php

namespace App\Contract\Entity;

use App\Contract\Entity\Permission\NameInterface as BasePermissionNameInterface;
use App\Contract\Entity\NameInterface as EntityNameInterface;

interface PermissionNameInterface
{
    const COUNTERAGENT = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::COUNTERAGENT;
    const CURRENCY = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::CURRENCY;
    const DISCOUNTED_PRODUCT = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::DISCOUNTED_PRODUCT;
    const EXCHANGE_RATE = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::EXCHANGE_RATE;
    const MONEY_CHANGE = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::MONEY_CHANGE;
    const MONEY_TRANSFER = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::MONEY_TRANSFER;
    const ORDER = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::ORDER;
    const PHARMACY = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::PHARMACY;
    const PRODUCT = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::PRODUCT;
    const PRODUCT_CATEGORY = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::PRODUCT_CATEGORY;
    const ROLE = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::ROLE;
    const USER = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::USER;
    const WAREHOUSE = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::WAREHOUSE;
    const WALLET = BasePermissionNameInterface::CRM . '.' . EntityNameInterface::WALLET;
}
