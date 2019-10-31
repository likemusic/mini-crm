<?php

namespace App\Entity\ExchangeRate\MainMenu;

use App\Contract\Entity\ExchangeRate\MenuInterface;
use App\Entity\ExchangeRate\CrudUseVariantProvider;
use App\Entity\ExchangeRate\NamesProvider;
use App\Entity\ExchangeRate\PermissionsProvider;
use App\Entity\ExchangeRate\Route\NameProvider as RouteNameProvider;
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
