<?php

namespace App\DataProvider\Entity;

use App\Contract\Entity\Base\PermissionsProviderInterface;
use App\Contract\Entity\NameInterface as EntityNameInterface;
use App\Contract\Entity\PermissionProviderClassNameInterface;
use Illuminate\Contracts\Container\Container;

class PermissionsProviderProvider
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    private $entityNameToPermissionProviderClassName = [
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

    public function getPermissionProviderByName(string $entityName): PermissionsProviderInterface
    {
        $permissionProviderClassName = $this->getPermissionProviderClassNameByEntityName($entityName);

        return $this->getInstance($permissionProviderClassName);
    }

    private function getInstance(string $entityName)
    {
        return $this->container->get($entityName);
    }

    private function getPermissionProviderClassNameByEntityName(string $entityName): string
    {
        $map = $this->entityNameToPermissionProviderClassName;

        if (!array_key_exists($entityName, $map)) {
            throw new \InvalidArgumentException('Invalid entity name: '. $entityName);
        }

        return $map[$entityName];
    }

}
