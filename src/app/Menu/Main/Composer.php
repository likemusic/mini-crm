<?php

declare(strict_types=1);

namespace App\Menu\Main;

use App\Common\User\GetCurrentUserTrait;
use App\Contract\MainMenu\RegistrarInterface;
use App\Menu\Main\Root\AccessibleMenuRegistrarsProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\Menu;

class Composer
{
    use GetCurrentUserTrait;
    /**
     * @var Dashboard
     */
    private $dashboard;

    /** @var AccessibleMenuRegistrarsProvider */
    private $accessibleMenuRegistrarsProvider;

    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     * @param AccessibleMenuRegistrarsProvider $accessibleMenuRegistrarsProvider
     */
    public function __construct(
        Dashboard $dashboard,
        AccessibleMenuRegistrarsProvider $accessibleMenuRegistrarsProvider
    )
    {
        $this->dashboard = $dashboard;
        $this->accessibleMenuRegistrarsProvider = $accessibleMenuRegistrarsProvider;
    }

    /**
     * Registering the main menu items.
     */
    public function compose()
    {
        // Main
        $dashboardMenu = $this->dashboard->menu;
        $menuRegistrars = $this->getAccessibleMenuRegistrars();
        $this->runMenuRegistrars($dashboardMenu, $menuRegistrars);
    }

    /**
     * @return RegistrarInterface[]
     */
    private function getAccessibleMenuRegistrars(): array
    {
        return $this->accessibleMenuRegistrarsProvider->getAccessibleMenuRegistrars();
    }

    /**
     * @param Menu $menu
     * @param RegistrarInterface[] $menuRegistrars
     */
    private function runMenuRegistrars(Menu $menu, array $menuRegistrars)
    {
        foreach ($menuRegistrars as $menuRegistrar) {
            $menuRegistrar->addMenu($menu);
        }
    }
}
