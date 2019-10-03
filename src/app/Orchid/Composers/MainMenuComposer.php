<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use App\Entity\DiscountedProduct\MenuRegistrar as DiscountedProductMenuRegistrar;
use App\Entity\Product\MenuRegistrar as ProductMenuRegistrar;
use App\Entity\ProductCategory\MenuRegistrar as ProductCategoryMenuRegistrar;
use App\Entity\UnaccountedProduct\MenuRegistrar as UnaccountedProductMenuRegistrar;
use App\Entity\Warehouse\MenuRegistrar as WarehouseMenuRegistrar;
use App\Entity\ProductQuote\MenuRegistrar as ProductQuoteMenuRegistrar;
use App\Entity\OrderItem\MenuRegistrar as OrderItemMenuRegistrar;
use App\Entity\Order\MenuRegistrar as OrderMenuRegistrar;
use App\Entity\Counteragent\MenuRegistrar as CounteragentMenuRegistrar;
use App\Entity\Wallet\MenuRegistrar as WalletMenuRegistrar;
use App\Entity\ExchangeRate\MenuRegistrar as ExchangeRateMenuRegistrar;
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
     * @var ProductCategoryMenuRegistrar
     */
    private $productCategoryMenuRegistrar;

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
     * @var ProductQuoteMenuRegistrar
     */
    private $productQuoteMenuRegistrar;

    /**
     * @var OrderItemMenuRegistrar
     */
    private $orderItemMenuRegistrar;

    /**
     * @var OrderMenuRegistrar
     */
    private $orderMenuRegistrar;

    /**
     * @var CounteragentMenuRegistrar
     */
    private $counteragentMenuRegistrar;

    /**
     * @var WalletMenuRegistrar
     */
    private $walletMenuRegistrar;

    /**
     * @var ExchangeRateMenuRegistrar
     */
    private $exchangeRateMenuRegistrar;

    /**
     * MenuComposer constructor.
     *
     * @param Dashboard $dashboard
     * @param ProductMenuRegistrar $productMenuRegistrar
     * @param ProductCategoryMenuRegistrar $productCategoryMenuRegistrar
     * @param WarehouseMenuRegistrar $warehouseMenuRegistrar
     * @param UnaccountedProductMenuRegistrar $unaccountedProductMenuRegistrar
     * @param DiscountedProductMenuRegistrar $discountedProductMenuRegistrar
     * @param ProductQuoteMenuRegistrar $productQuoteMenuRegistrar
     * @param OrderItemMenuRegistrar $orderItemMenuRegistrar
     * @param OrderMenuRegistrar $orderMenuRegistrar
     * @param CounteragentMenuRegistrar $counteragentMenuRegistrar
     * @param WalletMenuRegistrar $walletMenuRegistrar
     * @param ExchangeRateMenuRegistrar $exchangeRateMenuRegistrar
     */
    public function __construct(
        Dashboard $dashboard,
        ProductMenuRegistrar $productMenuRegistrar,
        ProductCategoryMenuRegistrar $productCategoryMenuRegistrar,
        WarehouseMenuRegistrar $warehouseMenuRegistrar,
        UnaccountedProductMenuRegistrar $unaccountedProductMenuRegistrar,
        DiscountedProductMenuRegistrar $discountedProductMenuRegistrar,
        ProductQuoteMenuRegistrar $productQuoteMenuRegistrar,
        OrderItemMenuRegistrar $orderItemMenuRegistrar,
        OrderMenuRegistrar $orderMenuRegistrar,
        CounteragentMenuRegistrar $counteragentMenuRegistrar,
        WalletMenuRegistrar $walletMenuRegistrar,
        ExchangeRateMenuRegistrar $exchangeRateMenuRegistrar
    ) {
        $this->dashboard = $dashboard;
        $this->productMenuRegistrar = $productMenuRegistrar;
        $this->productCategoryMenuRegistrar = $productCategoryMenuRegistrar;
        $this->warehouseMenuRegistrar = $warehouseMenuRegistrar;
        $this->unaccountedProductMenuRegistrar = $unaccountedProductMenuRegistrar;
        $this->discountedProductMenuRegistrar = $discountedProductMenuRegistrar;
        $this->productQuoteMenuRegistrar = $productQuoteMenuRegistrar;
        $this->orderItemMenuRegistrar = $orderItemMenuRegistrar;
        $this->orderMenuRegistrar = $orderMenuRegistrar;
        $this->counteragentMenuRegistrar = $counteragentMenuRegistrar;
        $this->warehouseMenuRegistrar = $warehouseMenuRegistrar;
        $this->walletMenuRegistrar = $walletMenuRegistrar;
        $this->exchangeRateMenuRegistrar = $exchangeRateMenuRegistrar;
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
            $this->productCategoryMenuRegistrar->register($dashboardMenu);
            $this->warehouseMenuRegistrar->register($dashboardMenu);
            $this->unaccountedProductMenuRegistrar->register($dashboardMenu);
            $this->discountedProductMenuRegistrar->register($dashboardMenu);
            $this->productQuoteMenuRegistrar->register($dashboardMenu);
            $this->orderItemMenuRegistrar->register($dashboardMenu);
            $this->orderMenuRegistrar->register($dashboardMenu);
            $this->counteragentMenuRegistrar->register($dashboardMenu);
            $this->walletMenuRegistrar->register($dashboardMenu);
            $this->exchangeRateMenuRegistrar->register($dashboardMenu);
    }
}
