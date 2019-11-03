<?php

namespace App\Menu\Main\Root;

use App\Contract\MainMenu\RegistrarInterface;

class AccessibleMenuRegistrarsProvider
{
    /** @var AccessibleItemNamesProvider */
    private $accessibleItemNamesProvider;

    /** @var MenuRegistrarProvider */
    private $menuRegistrarProvider;

    public function __construct(
        AccessibleItemNamesProvider $accessibleItemNamesProvider,
        MenuRegistrarProvider $menuRegistrarProvider
    )
    {
        $this->accessibleItemNamesProvider = $accessibleItemNamesProvider;
        $this->menuRegistrarProvider = $menuRegistrarProvider;
    }


    /**
     * @return RegistrarInterface[]
     */
    public function getAccessibleMenuRegistrars(): array
    {
        $accessibleRootMenuItemNames = $this->getAccessibleRootMenuItemNames();

        return $this->getMenuRegistrarsByRootItemNames($accessibleRootMenuItemNames);
    }

    private function getAccessibleRootMenuItemNames()
    {
        return $this->accessibleItemNamesProvider->getAccessibleRootMenuItemNames();
    }

    private function getMenuRegistrarsByRootItemNames($accessibleRootMenuItemNames): array
    {
        $ret = [];

        foreach ($accessibleRootMenuItemNames as $accessibleRootMenuItemName) {
            $ret[] = $this->getMenuRegistrarByRootItemName($accessibleRootMenuItemName);
        }

        return $ret;
    }

    private function getMenuRegistrarByRootItemName(string $accessibleRootMenuItemName): RegistrarInterface
    {
        return $this->menuRegistrarProvider->getRegistrarProviderByMenuItemName($accessibleRootMenuItemName);
    }
}
