<?php

namespace App\MainMenu\Registrar\Child;

use App\Contract\MainMenu\ItemData\ChildInterface as ChildItemDataInterface;
use App\Contract\MainMenu\Registrar\ChildInterface;
use App\MainMenu\Registrar\Base as ParentClass;

/**
 * Class Base
 * @property ChildItemDataInterface $itemData;
*/
abstract class Base extends ParentClass implements ChildInterface
{
    public function __construct(
        ChildItemDataInterface $itemData
    )
    {
        parent::__construct($itemData);
    }

    protected function canAccessMenu(string $crmPermission): bool
    {
        return $this->isCurrentUserHasAccess($crmPermission);
    }

    protected function getMenuItem()
    {
        $menuLabel = $this->getMenuLabel();
        $menuIcon = $this->getMenuIcon();
        $menuSlug = $this->getMenuSlug();
        $menuRouteName = $this->getMenuRouteName();
        $menuTitle = $this->getMenuTitle();

        $menuItem = $this->createMenuItem(
            $menuLabel,
            $menuSlug,
            $menuIcon,
            $menuRouteName,
            $menuTitle
        );

        return $menuItem;
    }

    protected function getMenuRouteName(): string
    {
        return $this->itemData->getRouteName();
    }

    protected function getMenuTitle()
    {
        return $this->itemData->getTitle();
    }
}
