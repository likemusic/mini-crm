<?php

namespace App\Entity\OrderItem\Route;

use App\Contract\Entity\Base\Route\PathProviderInterface;

class PathProvider implements PathProviderInterface
{
    public function getList()
    {
        return 'order-item';
    }

    public function getNew()
    {
        return 'order-item/new';
    }

    public function getEdit()
    {
        return 'order-item/{orderItem}';
    }
}
