<?php

namespace App\Entity\Product\Route;

use App\Contract\Entity\Base\Route\NameProviderInterface;

class NameProvider implements NameProviderInterface
{
    public function getList(): string
    {
        return 'platform.product.list';
    }

    public function getNew(): string
    {
        return 'platform.product.new';
    }

    public function getEdit(): string
    {
        return 'platform.product.edit';
    }
}
