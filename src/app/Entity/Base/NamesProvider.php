<?php

namespace App\Entity\Base;

use App\Contract\Entity\Base\NamesProviderInterface;

abstract class NamesProvider implements NamesProviderInterface
{
    public function getRoutePlaceholder(): string
    {
        return $this->getItemDataKey();
    }

    public function getRouteBasePath(): string
    {
        return $this->getListDataKey();
    }
}
