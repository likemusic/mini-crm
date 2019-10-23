<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use App\Entity\DiscountedProduct\MenuRegistrar as DiscountedProductMenuRegistrar;
use App\Entity\Pharmacy\MenuRegistrar as PharmacyMenuRegistrar;
use App\Entity\Product\MenuRegistrar as ProductMenuRegistrar;
use App\Entity\ProductCategory\MenuRegistrar as ProductCategoryMenuRegistrar;
use App\Entity\UnaccountedProduct\MenuRegistrar as UnaccountedProductMenuRegistrar;
use App\Entity\Warehouse\MenuRegistrar as WarehouseMenuRegistrar;
use App\Entity\StockItem\MenuRegistrar as StockItemMenuRegistrar;
use App\Entity\ProductQuote\MenuRegistrar as ProductQuoteMenuRegistrar;
use App\Entity\OrderItem\MenuRegistrar as OrderItemMenuRegistrar;
use App\Entity\Order\MenuRegistrar as OrderMenuRegistrar;
use App\Entity\Counteragent\MenuRegistrar as CounteragentMenuRegistrar;
use App\Entity\Currency\MenuRegistrar as CurrencyMenuRegistrar;
use App\Entity\Wallet\MenuRegistrar as WalletMenuRegistrar;
use App\Entity\ExchangeRate\MenuRegistrar as ExchangeRateMenuRegistrar;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Menu;
use App\Contract\Entity\Permission\Menu\Main\NameInterface as MainMenuPermissionNameInterface;
use App\Contract\Entity\Permission\Crm\ProductCategory\NameInterface as ProductCategoryNameInterface;
use App\Contract\Entity\Permission\Crm\Product\NameInterface as ProductNameInterface;

class MainMenuComposer
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    /**
     * @var PharmacyMenuRegistrar
     */
    private $pharmacyMenuRegistrar;

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
     * @var StockItemMenuRegistrar
     */
    private $stockItemMenuRegistrar;

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
     * @param PharmacyMenuRegistrar $pharmacyMenuRegistrar
     * @param ProductMenuRegistrar $productMenuRegistrar
     * @param ProductCategoryMenuRegistrar $productCategoryMenuRegistrar
     * @param WarehouseMenuRegistrar $warehouseMenuRegistrar
     * @param StockItemMenuRegistrar $stockItemMenuRegistrar
     * @param UnaccountedProductMenuRegistrar $unaccountedProductMenuRegistrar
     * @param DiscountedProductMenuRegistrar $discountedProductMenuRegistrar
     * @param ProductQuoteMenuRegistrar $productQuoteMenuRegistrar
     * @param OrderItemMenuRegistrar $orderItemMenuRegistrar
     * @param OrderMenuRegistrar $orderMenuRegistrar
     * @param CounteragentMenuRegistrar $counteragentMenuRegistrar
     * @param CurrencyMenuRegistrar $currencyMenuRegistrar
     * @param WalletMenuRegistrar $walletMenuRegistrar
     * @param ExchangeRateMenuRegistrar $exchangeRateMenuRegistrar
     */
    public function __construct(
        Dashboard $dashboard,
        PharmacyMenuRegistrar $pharmacyMenuRegistrar,
        ProductMenuRegistrar $productMenuRegistrar,
        ProductCategoryMenuRegistrar $productCategoryMenuRegistrar,
        WarehouseMenuRegistrar $warehouseMenuRegistrar,
        StockItemMenuRegistrar $stockItemMenuRegistrar,
        UnaccountedProductMenuRegistrar $unaccountedProductMenuRegistrar,
        DiscountedProductMenuRegistrar $discountedProductMenuRegistrar,
        ProductQuoteMenuRegistrar $productQuoteMenuRegistrar,
        OrderItemMenuRegistrar $orderItemMenuRegistrar,
        OrderMenuRegistrar $orderMenuRegistrar,
        CounteragentMenuRegistrar $counteragentMenuRegistrar,
        CurrencyMenuRegistrar $currencyMenuRegistrar,
        WalletMenuRegistrar $walletMenuRegistrar,
        ExchangeRateMenuRegistrar $exchangeRateMenuRegistrar
    ) {
        $this->dashboard = $dashboard;
        $this->pharmacyMenuRegistrar = $pharmacyMenuRegistrar;
        $this->productMenuRegistrar = $productMenuRegistrar;
        $this->productCategoryMenuRegistrar = $productCategoryMenuRegistrar;
        $this->warehouseMenuRegistrar = $warehouseMenuRegistrar;
        $this->stockItemMenuRegistrar = $stockItemMenuRegistrar;
        $this->unaccountedProductMenuRegistrar = $unaccountedProductMenuRegistrar;
        $this->discountedProductMenuRegistrar = $discountedProductMenuRegistrar;
        $this->productQuoteMenuRegistrar = $productQuoteMenuRegistrar;
        $this->orderItemMenuRegistrar = $orderItemMenuRegistrar;
        $this->orderMenuRegistrar = $orderMenuRegistrar;
        $this->counteragentMenuRegistrar = $counteragentMenuRegistrar;
        $this->warehouseMenuRegistrar = $warehouseMenuRegistrar;
        $this->currencyMenuRegistrar = $currencyMenuRegistrar;
        $this->walletMenuRegistrar = $walletMenuRegistrar;
        $this->exchangeRateMenuRegistrar = $exchangeRateMenuRegistrar;
    }

    /**
     * Registering the main menu items.
     */
    public function compose()
    {
        // Profile
//        $this->dashboard->menu
//            ->add(Menu::PROFILE,
//                ItemMenu::label('Empty 1')
//                    ->icon('icon-compass')
//            )
//            ->add(Menu::PROFILE,
//                ItemMenu::label('Empty 2')
//                    ->icon('icon-heart')
//                    ->badge(function () {
//                        return 6;
//                    })
//            );

        // Main
        $dashboardMenu = $this->dashboard->menu;

//            ->add(Menu::MAIN,
//                ItemMenu::label('Example')
//                    ->icon('icon-folder')
//                    ->route('platform.example')
//                    ->title('Example boilerplate')
//            )
//            ->add(Menu::MAIN,
//                ItemMenu::label('Empty menu')
//                    ->slug('example-menu')
//                    ->icon('icon-code')
//                    ->childs()
//            )
//            ->add('example-menu',
//                ItemMenu::label('Empty sub item 1')
//                    ->icon('icon-bag')
//            )
//            ->add('example-menu',
//                ItemMenu::label('Empty sub item 2')
//                    ->icon('icon-heart')
//                    ->title('Separate')
//            )
//            // Email sender
//            ->add(Menu::MAIN,
//                ItemMenu::label('Email sender')
//                    ->icon('icon-envelope-letter')
//                    ->route('platform.email')
//                    ->title('Tools')
//            );

        if ($this->canAccess(MainMenuPermissionNameInterface::PRODUCT_CATALOG)) {
            $this->addProductCatalogMenu($dashboardMenu);
        }

            //Entities
//            $this->productMenuRegistrar->register($dashboardMenu);
//            $this->warehouseMenuRegistrar->register($dashboardMenu);
//            $this->stockItemMenuRegistrar->register($dashboardMenu);
//            $this->unaccountedProductMenuRegistrar->register($dashboardMenu);
//            $this->discountedProductMenuRegistrar->register($dashboardMenu);
//            $this->productQuoteMenuRegistrar->register($dashboardMenu);
//            $this->orderItemMenuRegistrar->register($dashboardMenu);
//            $this->orderMenuRegistrar->register($dashboardMenu);
//            $this->counteragentMenuRegistrar->register($dashboardMenu);
//            $this->currencyMenuRegistrar->register($dashboardMenu);
//            $this->walletMenuRegistrar->register($dashboardMenu);
//            $this->exchangeRateMenuRegistrar->register($dashboardMenu);

        // Calculated
//        $this->pharmacyMenuRegistrar->register($dashboardMenu);
    }

    private function addProductCatalogMenu(Menu $menu)
    {
        $menu
            ->add(Menu::MAIN,
                ItemMenu::label('Каталог товаров')
                    ->slug('catalog')
                    ->icon('icon-book-open')
                    ->childs()
            );

        $this->productCategoryMenuRegistrar->register($menu, 'catalog');
    }

    private function canAccess($menuPermission)
    {
        $crmPermissions = $this->getCRMPermissionsByMenuPermission($menuPermission);
        $currentUser = $this->getCurrentUser();

        foreach ($crmPermissions as $crmPermission) {
            if ($currentUser->hasAccess($crmPermission)) {
                return true;
            }
        }

        return false;
    }


    private function getCurrentUser(): User
    {
        return Auth::user();
    }


    private function getCRMPermissionsByMenuPermission($menuPermission)
    {
        $menuPermissionMap = [
            MainMenuPermissionNameInterface::PRODUCT_CATALOG => [
                ProductNameInterface::LIST,
                ProductCategoryNameInterface::LIST,
            ]
        ];

        if (!array_key_exists($menuPermission, $menuPermissionMap)) {
            throw new \InvalidArgumentException('Invalid menu permission value: ' . $menuPermission);
        }

        return $menuPermissionMap[$menuPermission];
    }

}
