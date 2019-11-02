<?php

namespace App\Menu\Main\Base;

use App\Contract\MainMenu\ItemData\BaseInterface as BaseItemDataInterface;
use App\Contract\MainMenu\RenderedItemInterface;

class RenderedItem implements RenderedItemInterface
{
    /** @var BaseItemDataInterface */
    private $data;

    /** @var BaseItemDataInterface[] */
    private $children = [];

    public function __construct(BaseItemDataInterface $data, array $children)
    {
        $this->data = $data;
        $this->children = $children;
    }

    public function getData(): BaseItemDataInterface
    {
        return $this->data;
    }

    public function getChildren(): array
    {
        return $this->children;
    }
}
