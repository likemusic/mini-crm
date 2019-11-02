<?php

namespace App\Menu\Main;

use App\Menu\Main\Root\RenderedItemProvider;
use App\Menu\Main\Root\CrmPermissionByItemNameProvider;
use App\Menu\Main\Root\AccessResolver;

class Provider
{
    /**
     * @var StructureProvider
     */
    private $structureProvider;

    /** @var CrmPermissionByItemNameProvider */
    private $permissionByNameProvider;

    /** @var RenderedItemProvider */
    private $renderedItemProvider;

    /** @var AccessResolver */
    private $accessResolver;

    public function __construct(
        StructureProvider $structureProvider,
        CrmPermissionByItemNameProvider $permissionByNameProvider,
        RenderedItemProvider $renderedItemProvider,
        AccessResolver $accessResolver
    )
    {
        $this->structureProvider = $structureProvider;
        $this->permissionByNameProvider = $permissionByNameProvider;
        $this->renderedItemProvider = $renderedItemProvider;
        $this->accessResolver = $accessResolver;
    }

    public function getMenuRenderedItems()
    {
        $rootMenuItemsNames = $this->getAccessibleRootMenuItemNames();

        return $this->getRenderedMenuItemsByNames($rootMenuItemsNames);
    }

    private function getAccessibleRootMenuItemNames()
    {
        $rootMenuItemsNames = $this->getRootMenuItemNames();

        return array_filter($rootMenuItemsNames, [$this, 'isCurrentUserHaveAccessToRootMenu']);
    }

    private function isCurrentUserHaveAccessToRootMenu($rootMenuItemName)
    {
        $rootMenuPermission = $this->getRootMenuItemPermissionByName($rootMenuItemName);

        return $this->isCurrentUserHaveRootMenuPermission($rootMenuPermission);
    }

    private function isCurrentUserHaveRootMenuPermission($rootMenuPermission)
    {
        return $this->accessResolver->canAccess($rootMenuPermission);
    }

    private function getRootMenuItemPermissionByName($rootMenuItemName): string
    {
        return $this->permissionByNameProvider->getPermissionByName($rootMenuItemName);
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

    private function getRenderedMenuItemsByNames(array $rootMenuItemsNames)
    {
        $ret = [];

        foreach ($rootMenuItemsNames as $rootMenuItemName) {
            $ret[] = $this->getRenderedMenuItemByName($rootMenuItemName);
        }

        return $ret;
    }

    private function getRenderedMenuItemByName(string $rootMenuItemName)
    {
        return $this->renderedItemProvider->getRenderedItemByName($rootMenuItemName);
    }
}
