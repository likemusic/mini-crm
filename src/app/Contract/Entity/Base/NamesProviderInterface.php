<?php

namespace App\Contract\Entity\Base;

interface NamesProviderInterface
{
    public function getRoutePlaceholder(): string;
    public function getRouteBasePath(): string;
    public function getRouteBaseName(): string;
    public function getItemDataKey(): string;
    public function getListDataKey(): string;
}
