<?php

namespace App\Menu\Main;

class ChildrenItemNamesProvider
{
    /** @var StructureProvider */
    private $structureProvider;

    public function __construct(StructureProvider $structureProvider)
    {
        $this->structureProvider = $structureProvider;
    }

    public function getChildrenItemNamesByName(string $rootItemName)
    {
        $structure = $this->getStructure();

        return $this->getValueByKey($structure, $rootItemName);
    }

    private function getValueByKey($map, $key)
    {
        if (!array_key_exists($key, $map)) {
            throw new \InvalidArgumentException('Invalid root menu item name: '. $key);
        }

        return $map[$key];
    }

    private function getStructure()
    {
        return $this->structureProvider->getTree();
    }
}
