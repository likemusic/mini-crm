<?php

namespace App\Menu\Main\Root\UsersAndRoles;

use App\Contract\MainMenu\Root\PermissionNameInterface as MainMenuPermissionNameInterface;
use App\Menu\Main\PermissionToCrmPermissionsConverter as MainMenuPermissionToCrmPermissionsConverter;
use App\Menu\Main\Root\Base\Registrar as BaseRegistrar;
use App\Menu\Main\Root\UsersAndRoles\ItemData as MenuItemData;
use App\Entity\User\MainMenu\Registrar as UserMenuRegistrar;
use App\Entity\Role\MainMenu\Registrar as RoleMenuRegistrar;

class Registrar extends BaseRegistrar
{
    /**
     * @var UserMenuRegistrar
     */
    private $userMenuRegistrar;

    /**
     * @var RoleMenuRegistrar
     */
    private $roleMenuRegistrar;

    /**
     * @param MainMenuPermissionToCrmPermissionsConverter $mainMenuPermissionToCrmPermissionsConverter
     * @param MenuItemData $itemData
     * @param UserMenuRegistrar $userMenuRegistrar
     * @param RoleMenuRegistrar $exchangeRateMenuRegistrar
     */
    public function __construct(
        MainMenuPermissionToCrmPermissionsConverter $mainMenuPermissionToCrmPermissionsConverter,
        MenuItemData $itemData,
        UserMenuRegistrar $userMenuRegistrar,
        RoleMenuRegistrar $exchangeRateMenuRegistrar
    )
    {
        $this->userMenuRegistrar = $userMenuRegistrar;
        $this->roleMenuRegistrar = $exchangeRateMenuRegistrar;

        parent::__construct($mainMenuPermissionToCrmPermissionsConverter, $itemData);
    }

    protected function getChildMenuRegistrars(): array
    {
        return [
            $this->userMenuRegistrar,
            $this->roleMenuRegistrar,
        ];
    }

    protected function getMenuPermission(): string
    {
        return MainMenuPermissionNameInterface::USERS_AND_ROLES;
    }
}
