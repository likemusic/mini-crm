<?php

namespace App\Contract\Entity\Base;

interface NamesProviderInterface
{
    public function getRoutePlaceholder(): string;
    public function getRouteBasePath(): string;
    public function getItemDataKey();
    public function getListDataKey();
}
