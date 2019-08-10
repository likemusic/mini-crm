<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use App\Contract\Entity\Product\MenuInterface as ProductMenuInterface;
use App\Contract\Entity\Product\Route\NameInterface;
use App\Entity\Product\Route\NameProvider as ProductRouteNameProvider;
use App\Entity\Product\UseVariantProvider as ProductUseVariant;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Menu;
use App\Entity\Product\MenuRegistrar as ProductMenuRegistrar;
use App\Entity\Warehouse\MenuRegistrar as WarehouseMenuRegistrar;

class MainMenuComposer
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     * @var ProductUseVariant
     */
    private $productUseVariant;

    /**
     * @var ProductRouteNameProvider
     */
    private $productRouteNameProvider;

    /**
     * @var ProductMenuRegistrar
     */
    private $productMenuRegistrar;

    /**
     * @var WarehouseMenuRegistrar
     */
    private $warehouseMenuRegistrar;

    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     * @param ProductUseVariant $productUseVariant
     * @param ProductRouteNameProvider $productRouteNameProvider
     * @param ProductMenuRegistrar $productMenuRegistrar
     * @param WarehouseMenuRegistrar $warehouseMenuRegistrar
     */
    public function __construct(
        Dashboard $dashboard,
        ProductUseVariant $productUseVariant,
        ProductRouteNameProvider $productRouteNameProvider,
        ProductMenuRegistrar $productMenuRegistrar,
        WarehouseMenuRegistrar $warehouseMenuRegistrar
    ) {
        $this->dashboard = $dashboard;
        $this->productUseVariant = $productUseVariant;
        $this->productRouteNameProvider = $productRouteNameProvider;
        $this->productMenuRegistrar = $productMenuRegistrar;
        $this->warehouseMenuRegistrar = $warehouseMenuRegistrar;
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
    }
}
