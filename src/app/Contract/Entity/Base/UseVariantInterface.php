<?php

namespace App\Contract\Entity\Base;

interface UseVariantInterface
{
    public function getItemName(): string;
    public function getListName(): string;
    public function getGenitiveName(): string;
}
