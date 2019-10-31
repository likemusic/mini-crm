<?php

namespace App\MainMenu\ItemData\EntityBased;

use App\Contract\Entity\User\MenuInterface;
use App\Entity\User\CrudUseVariantProvider;
use App\Entity\User\NamesProvider;
use App\Entity\User\PermissionsProvider;
use App\Entity\User\Route\NameProvider as RouteNameProvider;

class User extends Base
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
