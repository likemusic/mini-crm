<?php

namespace App\MainMenu\ItemData\EntityBased;

use App\Contract\Entity\Currency\MenuInterface;
use App\Entity\Currency\CrudUseVariantProvider;
use App\Entity\Currency\NamesProvider;
use App\Entity\Currency\PermissionsProvider;
use App\Entity\Currency\Route\NameProvider as RouteNameProvider;

class Currency extends Base
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
