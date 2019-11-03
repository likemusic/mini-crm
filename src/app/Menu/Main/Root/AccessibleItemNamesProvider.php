<?php

namespace App\Menu\Main\Root;

use App\Menu\Main\Root\AccessResolver\ByMenuItemPermission as ByPermissionNameAccessResolver;
use App\Menu\Main\StructureProvider;

class AccessibleItemNamesProvider
{
    /** @var StructureProvider  */
    private $structureProvider;

    /** @var CrmPermissionByItemNameProvider  */
    private $crmPermissionByItemNameProvider;

    /** @var ByPermissionNameAccessResolver */
    private $accessResolver;

    public function __construct(
        StructureProvider $structureProvider,
        CrmPermissionByItemNameProvider $crmPermissionByItemNameProvider,
        ByPermissionNameAccessResolver $accessResolver
    )
    {
        $this->structureProvider = $structureProvider;
        $this->crmPermissionByItemNameProvider = $crmPermissionByItemNameProvider;
        $this->accessResolver = $accessResolver;
    }

    public function getAccessibleRootMenuItemNames()
    {
        $rootMenuItemsNames = $this->getRootMenuItemNames();

        return array_filter($rootMenuItemsNames, [$this, 'isCurrentUserHaveAccessToRootMenu']);
    }

    private function getRootMenuItemNames()
    {
        $menuNamesTree = $this->getMenuNamesTree();

        return array_keys($menuNamesTree);
    }

    private function getMenuNamesTree()
    {
        return $this->structureProvider->getTree();
    }

    private function isCurrentUserHaveAccessToRootMenu($rootMenuItemName)
    {
        $rootMenuPermission = $this->getRootMenuItemPermissionByName($rootMenuItemName);

        return $this->isCurrentUserHaveRootMenuPermission($rootMenuPermission);
    }

    private function getRootMenuItemPermissionByName($rootMenuItemName): string
    {
        return $this->crmPermissionByItemNameProvider->getPermissionByName($rootMenuItemName);
    }

    private function isCurrentUserHaveRootMenuPermission($rootMenuPermission)
    {
        return $this->accessResolver->canAccess($rootMenuPermission);
    }
}
