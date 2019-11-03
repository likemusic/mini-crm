<?php

namespace App\Menu\Main\Root\UsersAndRoles;

use App\Menu\Main\ChildrenItemNamesProvider;
use App\Menu\Main\NotRoot\AccessResolver\ByMenuItemName as ByMenuItemNameAccessResolver;
use App\Menu\Main\NotRoot\MenuRegistrarProvider as NotRootMenuRegistrarProvider;
use App\Menu\Main\Root\Base\Registrar as BaseRegistrar;
use App\Menu\Main\Root\ItemNameByMenuRegistrarProvider;
use App\Menu\Main\Root\UsersAndRoles\ItemData as MenuItemData;

class Registrar extends BaseRegistrar
{
    public function __construct(
        MenuItemData $itemData,
        ItemNameByMenuRegistrarProvider $itemNameByMenuRegistrarProvider,
        ChildrenItemNamesProvider $childrenItemNamesProvider,
        NotRootMenuRegistrarProvider $notRootMenuRegistrarProvider,
        ByMenuItemNameAccessResolver $byMenuItemNameAccessResolver
    )
    {
        parent::__construct(
            $itemData,
            $itemNameByMenuRegistrarProvider,
            $childrenItemNamesProvider,
            $notRootMenuRegistrarProvider,
            $byMenuItemNameAccessResolver
        );
    }
}
