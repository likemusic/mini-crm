<?php

namespace App\Entity\Settings\MainMenu;

use App\Contract\Entity\Settings\MenuInterface;
use App\Entity\Settings\CrudUseVariantProvider;
use App\Entity\Settings\NamesProvider;
use App\Entity\Settings\PermissionsProvider;
use App\Entity\Settings\Route\NameProvider as RouteNameProvider;
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
