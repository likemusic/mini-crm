<?php

namespace App\MainMenu\Registrar\Root;

use App\Contract\Entity\Permission\Menu\Main\NameInterface as MainMenuPermissionNameInterface;
use App\Helper\MainMenu\PermissionToCrmPermissionsConverter as MainMenuPermissionToCrmPermissionsConverter;
use App\MainMenu\Root\ProductCatalog\ItemData as MenuItemData;
use App\MainMenu\Registrar\Child\Product as ProductMenuRegistrar;
use App\MainMenu\Registrar\Child\ProductCategory as ProductCategoryMenuRegistrar;

class ProductCatalog extends Registrar
{
    /**
     * @var ProductMenuRegistrar
     */
    private $productMenuRegistrar;

    /** @var ProductCategoryMenuRegistrar */
    private $productCategoryMenuRegistrar;

    public function __construct(
        MainMenuPermissionToCrmPermissionsConverter $mainMenuPermissionToCrmPermissionsConverter,
        MenuItemData $itemData,
        ProductMenuRegistrar $currencyMenuRegistrar,
        ProductCategoryMenuRegistrar $exchangeRateMenuRegistrar
    )
    {
        $this->productMenuRegistrar = $currencyMenuRegistrar;
        $this->productCategoryMenuRegistrar = $exchangeRateMenuRegistrar;

        parent::__construct($mainMenuPermissionToCrmPermissionsConverter, $itemData);
    }

    protected function getChildMenuRegistrars(): array
    {
        return [
            $this->productMenuRegistrar,
            $this->productCategoryMenuRegistrar,
        ];
    }

    protected function getMenuPermission(): string
    {
        return MainMenuPermissionNameInterface::PRODUCT_CATALOG;
    }
}
