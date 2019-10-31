<?php

namespace App\Entity\ProductCategory\MainMenu;

use App\Contract\Entity\ProductCategory\MenuInterface;
use App\Entity\ProductCategory\CrudUseVariantProvider;
use App\Entity\ProductCategory\NamesProvider;
use App\Entity\ProductCategory\PermissionsProvider;
use App\Entity\ProductCategory\Route\NameProvider as RouteNameProvider;
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
