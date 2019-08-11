<?php

namespace App\Entity\UnaccountedProduct\Route;

use App\Contract\Entity\Base\Route\NameProviderInterface;

class NameProvider implements NameProviderInterface
{
    public function getList(): string
    {
        return 'platform.unaccounted-product.list';
    }

    public function getNew(): string
    {
        return 'platform.unaccounted-product.new';
    }

    public function getEdit(): string
    {
        return 'platform.unaccounted-product.edit';
    }
}
