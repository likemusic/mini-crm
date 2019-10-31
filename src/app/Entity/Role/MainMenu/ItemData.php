<?php

namespace App\Entity\Role\MainMenu;

use App\Contract\Entity\Role\MenuInterface;
use App\Entity\Role\CrudUseVariantProvider;
use App\Entity\Role\NamesProvider;
use App\Entity\Role\PermissionsProvider;
use App\Entity\Role\Route\NameProvider as RouteNameProvider;
use App\Entity\Base\MainMenu\ItemData as BaseItemData;

class ItemData extends BaseItemData
{
    public function __construct(
        PermissionsProvider $permissionsProvider,
        CrudUseVariantProvider $listUseVariantProvider,
        NamesProvider $namesProvider,
        RouteNameProvider $routeNameProvider
    )
    {
        parent::__construct($permissionsProvider, $listUseVariantProvider, $namesProvider, $routeNameProvider);
    }

    public function getIcon(): string
    {
        return MenuInterface::ICON;
    }

    public function getTitle(): ?string
    {
        return null;
    }
}
