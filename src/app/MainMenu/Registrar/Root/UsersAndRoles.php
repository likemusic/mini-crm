<?php

namespace App\MainMenu\Registrar\Root;

use App\Contract\Entity\Permission\Menu\Main\NameInterface as MainMenuPermissionNameInterface;
use App\Helper\MainMenu\PermissionToCrmPermissionsConverter as MainMenuPermissionToCrmPermissionsConverter;
use App\MainMenu\ItemData\Root\UsersAndRoles as MenuItemData;
//use App\MainMenu\Registrar\Child\User as UserMenuRegistrar;
//use App\MainMenu\Registrar\Child\Permission as PermissionMenuRegistrar;

class UsersAndRoles extends Base
{
    /**
     * @var UserMenuRegistrar
     */
    private $productMenuRegistrar;

    /** @var PermissionMenuRegistrar */
//    private $productCategoryMenuRegistrar;

    public function __construct(
        MainMenuPermissionToCrmPermissionsConverter $mainMenuPermissionToCrmPermissionsConverter,
        MenuItemData $itemData
//        UserMenuRegistrar $productMenuRegistrar,
//        PermissionMenuRegistrar $productCategoryMenuRegistrar
    )
    {
//        $this->productMenuRegistrar = $productMenuRegistrar;
//        $this->productCategoryMenuRegistrar = $productCategoryMenuRegistrar;

        parent::__construct($mainMenuPermissionToCrmPermissionsConverter, $itemData);
    }

    protected function getChildMenuRegistrars(): array
    {
        return [
//            $this->productMenuRegistrar,
//            $this->productCategoryMenuRegistrar,
        ];
    }

    protected function getMenuPermission(): string
    {
        return MainMenuPermissionNameInterface::PRODUCT_CATALOG;
    }
}
