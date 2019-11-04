<?php

namespace App\Menu\Main\Root\UsersAndRoles;

use App\Contract\MainMenu\ItemData\BaseInterface as BaseItemDataInterface;
use App\Menu\Main\Base\RenderedItem\ByCodeProvided as BaseRenderedItem;
use App\Contract\MainMenu\Root\NameInterface as RootItemNameInterface;
use App\Menu\Main\ChildrenItemNamesProvider;
use App\Menu\Main\NotRoot\RenderedItemProvider;

class RenderedItem extends BaseRenderedItem
{
    public function __construct(
        ItemData $data,
        ChildrenItemNamesProvider $childrenItemNamesProvider,
        RenderedItemProvider $renderedItemProvider
    )
    {
        parent::__construct($data, $childrenItemNamesProvider, $renderedItemProvider);
    }

    function getCurrentName(): string
    {
        return RootItemNameInterface::USERS_AND_ROLES;
    }
}