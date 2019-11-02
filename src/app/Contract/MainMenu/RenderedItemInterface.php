<?php

namespace App\Contract\MainMenu;

use App\Contract\MainMenu\ItemData\BaseInterface as BaseItemDataInterface;
use App\Contract\MainMenu\ItemData\ChildInterface;

interface RenderedItemInterface
{
    public function getData(): BaseItemDataInterface;

    /**
     * @return ChildInterface[]
     */
    public function getChildren(): array;
}
