<?php

namespace App\Entity\DiscountedProduct\Route;

use App\Contract\Entity\Base\Route\NameProviderInterface;

class NameProvider implements NameProviderInterface
{
    public function getList(): string
    {
        return 'platform.discounted-product.list';
    }

    public function getNew(): string
    {
        return 'platform.discounted-product.new';
    }

    public function getEdit(): string
    {
        return 'platform.discounted-product.edit';
    }
}
