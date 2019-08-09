<?php

namespace App\Contract\Entity\Base;

interface UseVariantProviderInterface
{
    public function getItemName(): string;
    public function getListName(): string;
    public function getGenitiveName(): string;
}
