<?php

namespace App\Menu\Main;

use App\Menu\Main\Root\AccessibleItemNamesProvider;
use App\Menu\Main\Root\RenderedItemProvider;

class Provider
{
    /** @var RenderedItemProvider */
    protected $renderedItemProvider;
    /** @var AccessibleItemNamesProvider */
    private $accessibleItemNamesProvider;

    public function __construct(
        AccessibleItemNamesProvider $accessibleItemNamesProvider,
        RenderedItemProvider $renderedItemProvider
    )
    {
        $this->accessibleItemNamesProvider = $accessibleItemNamesProvider;
        $this->renderedItemProvider = $renderedItemProvider;
    }

    public function getMenuRenderedItems()
    {
        $rootMenuItemsNames = $this->getAccessibleRootMenuItemNames();

        return $this->getRenderedMenuItemsByNames($rootMenuItemsNames);
    }

    private function getAccessibleRootMenuItemNames()
    {
        return $this->accessibleItemNamesProvider->getAccessibleRootMenuItemNames();
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
