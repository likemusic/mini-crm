<?php

namespace App\EntityMeta\DataProvider\ByName\PermissionProvider;

use App\Base\DataProvider\ClassNameProvider as BaseClassNameProvider;
use App\Contract\Entity\NameInterface as EntityNameInterface;
use App\Contract\Entity\PermissionProviderClassNameInterface;

class ClassNameProvider extends BaseClassNameProvider
{
    protected function getMap(): array
    {
        return [
            EntityNameInterface::PRODUCT => PermissionProviderClassNameInterface::PRODUCT,
            EntityNameInterface::COUNTERAGENT => PermissionProviderClassNameInterface::COUNTERAGENT,
            EntityNameInterface::CURRENCY => PermissionProviderClassNameInterface::CURRENCY,
            EntityNameInterface::DISCOUNTED_PRODUCT => PermissionProviderClassNameInterface::DISCOUNTED_PRODUCT,
            EntityNameInterface::EXCHANGE_RATE => PermissionProviderClassNameInterface::EXCHANGE_RATE,
            EntityNameInterface::MONEY_CHANGE => PermissionProviderClassNameInterface::MONEY_CHANGE,
//        EntityNameInterface::MONEY_TRANSFER => PermissionProviderClassNameInterface::MONEY_TRANSFER,
            EntityNameInterface::ORDER => PermissionProviderClassNameInterface::ORDER,
//        EntityNameInterface::PHARMACY => PermissionProviderClassNameInterface::PHARMACY,
            EntityNameInterface::PRODUCT => PermissionProviderClassNameInterface::PRODUCT,
            EntityNameInterface::PRODUCT_CATEGORY => PermissionProviderClassNameInterface::PRODUCT_CATEGORY,
            EntityNameInterface::ROLE => PermissionProviderClassNameInterface::ROLE,
            EntityNameInterface::WAREHOUSE => PermissionProviderClassNameInterface::WAREHOUSE,
            EntityNameInterface::USER => PermissionProviderClassNameInterface::USER,
            EntityNameInterface::SETTINGS => PermissionProviderClassNameInterface::SETTINGS,
        ];
    }
}
