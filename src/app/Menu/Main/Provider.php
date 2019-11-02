<?php

namespace App\Menu\Main;

use App\Menu\Main\Root\RenderedItemProvider;

class Provider
{
    /**
     * @var StructureProvider
     */
    private $structureProvider;

    /** @var RenderedItemProvider */
    private $renderedItemProvider;

    public function __construct(
        StructureProvider $structureProvider,
        RenderedItemProvider $renderedItemProvider
    )
    {
        $this->structureProvider = $structureProvider;
        $this->renderedItemProvider = $renderedItemProvider;
    }

    public function getMenuRenderedItems()
    {
        $rootMenuItemsNames = $this->getRootMenuItemNames();

        return $this->getRenderedMenuItemsByNames($rootMenuItemsNames);
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
