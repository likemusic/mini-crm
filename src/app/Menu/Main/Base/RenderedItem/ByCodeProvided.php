<?php

namespace App\Menu\Main\Base\RenderedItem;

use App\Contract\MainMenu\ItemData\BaseInterface as BaseItemDataInterface;
use App\Menu\Main\Base\RenderedItem as BaseRenderedItem;
use App\Menu\Main\ChildrenItemNamesProvider;
use App\Menu\Main\NotRoot\RenderedItemProvider;

abstract class ByCodeProvided extends BaseRenderedItem
{
    /** @var ChildrenItemNamesProvider */
    private $childrenItemNamesProvider;

    /** @var RenderedItemProvider */
    private $renderedItemProvider;

    public function __construct(
        BaseItemDataInterface $data,
        ChildrenItemNamesProvider $childrenItemNamesProvider,
        RenderedItemProvider $renderedItemProvider
    )
    {
        $this->childrenItemNamesProvider = $childrenItemNamesProvider;
        $this->renderedItemProvider = $renderedItemProvider;

        $children = $this->createChildren();

        parent::__construct($data, $children);
    }

    private function createChildren()
    {
        $childrenNames = $this->getChildrenNames();

        return $this->createChildrenByNames($childrenNames);
    }

    private function getChildrenNames()
    {
        $currentName = $this->getCurrentName();

        return $this->getChildrenItemNamesByName($currentName);
    }

    abstract function getCurrentName(): string;

    private function getChildrenItemNamesByName(string $parentName)
    {
        return $this->childrenItemNamesProvider->getChildrenItemNamesByName($parentName);
    }

    private function createChildrenByNames(array $childrenNames)
    {
        $ret = [];

        foreach ($childrenNames as $childrenName) {
            $ret[] = $this->createChildByName($childrenName);
        }

        return $ret;
    }

    private function createChildByName(string $childName)
    {
        return $this->renderedItemProvider->getRenderedItemByName($childName);
    }
}
