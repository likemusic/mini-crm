<?php

namespace App\Entity\OrderItem\Route;

use App\Contract\Entity\Base\Route\NameProviderInterface;

class NameProvider implements NameProviderInterface
{
    public function getList(): string
    {
        return 'platform.order-item.list';
    }

    public function getNew(): string
    {
        return 'platform.order-item.new';
    }

    public function getEdit(): string
    {
        return 'platform.order-item.edit';
    }
}
