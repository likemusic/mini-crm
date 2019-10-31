<?php

namespace App\Entity\Product\MainMenu;

use App\Contract\Entity\Product\MenuInterface;
use App\Entity\Product\CrudUseVariantProvider;
use App\Entity\Product\NamesProvider;
use App\Entity\Product\PermissionsProvider;
use App\Entity\Product\Route\NameProvider as RouteNameProvider;
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
