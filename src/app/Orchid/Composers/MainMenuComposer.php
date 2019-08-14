<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use App\Entity\DiscountedProduct\MenuRegistrar as DiscountedProductMenuRegistrar;
use App\Entity\Product\MenuRegistrar as ProductMenuRegistrar;
use App\Entity\UnaccountedProduct\MenuRegistrar as UnaccountedProductMenuRegistrar;
use App\Entity\Warehouse\MenuRegistrar as WarehouseMenuRegistrar;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Menu;

class MainMenuComposer
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     * @var ProductMenuRegistrar
     */
    private $productMenuRegistrar;

    /**
     * @var WarehouseMenuRegistrar
     */
    private $warehouseMenuRegistrar;

    /**
     * @var UnaccountedProductMenuRegistrar
     */
    private $unaccountedProductMenuRegistrar;

    /**
     * @var DiscountedProductMenuRegistrar
     */
    private $discountedProductMenuRegistrar;

    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     * @param ProductMenuRegistrar $productMenuRegistrar
     * @param WarehouseMenuRegistrar $warehouseMenuRegistrar
     * @param UnaccountedProductMenuRegistrar $unaccountedProductMenuRegistrar
     * @param DiscountedProductMenuRegistrar $discountedProductMenuRegistrar
     */
    public function __construct(
        Dashboard $dashboard,
        ProductMenuRegistrar $productMenuRegistrar,
        WarehouseMenuRegistrar $warehouseMenuRegistrar,
        UnaccountedProductMenuRegistrar $unaccountedProductMenuRegistrar,
        DiscountedProductMenuRegistrar $discountedProductMenuRegistrar
    ) {
        $this->dashboard = $dashboard;
        $this->productMenuRegistrar = $productMenuRegistrar;
        $this->warehouseMenuRegistrar = $warehouseMenuRegistrar;
        $this->unaccountedProductMenuRegistrar = $unaccountedProductMenuRegistrar;
        $this->discountedProductMenuRegistrar = $discountedProductMenuRegistrar;
    }

    /**
     * Registering the main menu items.
     */
    public function compose()
    {
        // Profile
        $this->dashboard->menu
            ->add(Menu::PROFILE,
                ItemMenu::label('Empty 1')
                    ->icon('icon-compass')
            )
            ->add(Menu::PROFILE,
                ItemMenu::label('Empty 2')
                    ->icon('icon-heart')
                    ->badge(function () {
                        return 6;
                    })
            );

        // Main
        $dashboardMenu = $this->dashboard->menu;

        $dashboardMenu
            ->add(Menu::MAIN,
                ItemMenu::label('Example')
                    ->icon('icon-folder')
                    ->route('platform.example')
                    ->title('Example boilerplate')
            )
            ->add(Menu::MAIN,
                ItemMenu::label('Empty menu')
                    ->slug('example-menu')
                    ->icon('icon-code')
                    ->childs()
            )
            ->add('example-menu',
                ItemMenu::label('Empty sub item 1')
                    ->icon('icon-bag')
            )
            ->add('example-menu',
                ItemMenu::label('Empty sub item 2')
                    ->icon('icon-heart')
                    ->title('Separate')
            )
            // Email sender
            ->add(Menu::MAIN,
                ItemMenu::label('Email sender')
                    ->icon('icon-envelope-letter')
                    ->route('platform.email')
                    ->title('Tools')
            );

            // Product
            $this->productMenuRegistrar->register($dashboardMenu);
            $this->warehouseMenuRegistrar->register($dashboardMenu);
            $this->unaccountedProductMenuRegistrar->register($dashboardMenu);
            $this->discountedProductMenuRegistrar->register($dashboardMenu);
    }
}
