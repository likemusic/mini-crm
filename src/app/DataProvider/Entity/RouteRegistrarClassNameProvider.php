<?php

namespace App\DataProvider\Entity;

use App\Contract\Entity\NameInterface as EntityNameInterface;
use App\Contract\Entity\RouteRegistrarClassNameInterface;

class RouteRegistrarClassNameProvider
{
    private $entityNameToRouteRegistrarClassNameMap = [
        EntityNameInterface::PRODUCT => RouteRegistrarClassNameInterface::PRODUCT,
        EntityNameInterface::PRODUCT_CATEGORY => RouteRegistrarClassNameInterface::PRODUCT_CATEGORY,
        EntityNameInterface::USER => RouteRegistrarClassNameInterface::USER,
        EntityNameInterface::ROLE => RouteRegistrarClassNameInterface::ROLE,
        EntityNameInterface::CURRENCY => RouteRegistrarClassNameInterface::CURRENCY,
        EntityNameInterface::SETTINGS => RouteRegistrarClassNameInterface::SETTINGS,
    ];


    public function getRouteRegistrarClassNameProviderByEntityName(string $entityName): string
    {
        $map = $this->entityNameToRouteRegistrarClassNameMap;

        if (!array_key_exists($entityName, $map)) {
            throw new \InvalidArgumentException('Invalid entity name: '. $entityName);
        }

        return $map[$entityName];
    }
}
