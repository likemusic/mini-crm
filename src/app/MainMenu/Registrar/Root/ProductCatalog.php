<?php

namespace App\MainMenu\Registrar\Root;

use App\Contract\Entity\Permission\Menu\Main\NameInterface as MainMenuPermissionNameInterface;
use App\Helper\MainMenu\PermissionToCrmPermissionsConverter as MainMenuPermissionToCrmPermissionsConverter;
use App\MainMenu\ItemData\Root\ProductCatalog as ProductCatalogItemData;
use App\MainMenu\Registrar\Child\Product as ProductMenuRegistrar;
use App\MainMenu\Registrar\Child\ProductCategory as ProductCategoryMenuRegistrar;

class ProductCatalog extends Base
{
    /**
     * @var ProductMenuRegistrar
     */
    private $productMenuRegistrar;

    /** @var ProductCategoryMenuRegistrar */
    private $productCategoryMenuRegistrar;

    public function __construct(
        MainMenuPermissionToCrmPermissionsConverter $mainMenuPermissionToCrmPermissionsConverter,
        ProductCatalogItemData $itemData,
        ProductMenuRegistrar $productMenuRegistrar,
        ProductCategoryMenuRegistrar $productCategoryMenuRegistrar
    )
    {
        $this->productMenuRegistrar = $productMenuRegistrar;
        $this->productCategoryMenuRegistrar = $productCategoryMenuRegistrar;

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
