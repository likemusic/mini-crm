<?php

namespace App\MainMenu\ItemData\EntityBased;

use App\Contract\Entity\Base\Route\NameProviderInterface as RouteNameProviderInterface;
use App\Contract\MainMenu\ItemData\ChildInterface as ChildItemDataInterface;
use App\Contract\Entity\Base\PermissionsProviderInterface;
use App\Contract\Entity\Base\UseVariantProvider\ListingInterface as  ListUseVariantProviderInterface;
use App\Contract\Entity\Base\NamesProviderInterface;

abstract class Base implements ChildItemDataInterface
{
    /**
     * @var PermissionsProviderInterface
     */
    private $permissionsProvider;

    /**
     * @var ListUseVariantProviderInterface
     */
    private $listUseVariantProvider;

    /**
     * @var NamesProviderInterface
     */
    private $namesProvider;

    /**
     * @var RouteNameProviderInterface
     */
    private $routeNameProvider;

    public function __construct(
        PermissionsProviderInterface $permissionsProvider,
        ListUseVariantProviderInterface $listUseVariantProvider,
        NamesProviderInterface $namesProvider,
        RouteNameProviderInterface $routeNameProviderInterface
    )
    {
        $this->permissionsProvider = $permissionsProvider;
        $this->listUseVariantProvider = $listUseVariantProvider;
        $this->namesProvider = $namesProvider;
        $this->routeNameProvider = $routeNameProviderInterface;
    }

    public function getPermission(): string
    {
        return $this->permissionsProvider->getList();
    }

    public function getLabel(): string
    {
        return $this->listUseVariantProvider->getListName();
    }

    public function getSlug(): string
    {
        return $this->namesProvider->getItemDataKey();
    }

    public function getRouteName(): ?string
    {
        return $this->routeNameProvider->getList();
    }
}
