<?php

namespace App\Menu\Main\NotRoot\AccessResolver;

use App\Menu\Main\Base\AccessResolver\ByEntityName as ByEntityNameMenuAccessResolver;
use App\Menu\Main\Base\AccessResolver\ByMenuItemName as BaseByMenuItemNameAccessResolver;
use App\Menu\Main\NotRoot\EntityNameByMenuItemNameProvider;

class ByMenuItemName extends BaseByMenuItemNameAccessResolver
{
    /** @var EntityNameByMenuItemNameProvider */
    private $entityNameByMenuItemNameProvider;

    /** @var ByEntityNameMenuAccessResolver */
    private $byEntityNameMenuAccessResolver;

    public function __construct(
        EntityNameByMenuItemNameProvider $entityNameByMenuItemNameProvider,
        ByEntityNameMenuAccessResolver $byEntityNameMenuAccessResolver
    )
    {
        $this->entityNameByMenuItemNameProvider = $entityNameByMenuItemNameProvider;
        $this->byEntityNameMenuAccessResolver = $byEntityNameMenuAccessResolver;
    }

    public function canAccess(string $menuItemName): bool
    {
        $entityName = $this->getEntityNameByMenuItemName($menuItemName);

        return $this->canAccessByEntityName($entityName);
    }

    private function getEntityNameByMenuItemName(string $menuItemName): string
    {
        return $this->entityNameByMenuItemNameProvider->getEntityNameByMenuItemName($menuItemName);
    }

    private function canAccessByEntityName(string $entityName): bool
    {
        return $this->byEntityNameMenuAccessResolver->canAccess($entityName);
    }
}
