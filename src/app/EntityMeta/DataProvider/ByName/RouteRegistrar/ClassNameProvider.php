<?php

namespace App\EntityMeta\DataProvider\ByName\RouteRegistrar;

use App\Base\DataProvider\ClassNameProvider as BaseClassNameProvider;
use App\Contract\Entity\NameInterface as EntityNameInterface;
use App\Contract\Entity\RouteRegistrarClassNameInterface;

class ClassNameProvider extends BaseClassNameProvider
{
    protected function getMap(): array
    {
        return [
            EntityNameInterface::PRODUCT => RouteRegistrarClassNameInterface::PRODUCT,
            EntityNameInterface::PRODUCT_CATEGORY => RouteRegistrarClassNameInterface::PRODUCT_CATEGORY,
            EntityNameInterface::USER => RouteRegistrarClassNameInterface::USER,
            EntityNameInterface::ROLE => RouteRegistrarClassNameInterface::ROLE,
            EntityNameInterface::CURRENCY => RouteRegistrarClassNameInterface::CURRENCY,
            EntityNameInterface::SETTINGS => RouteRegistrarClassNameInterface::SETTINGS,
        ];
    }
}
