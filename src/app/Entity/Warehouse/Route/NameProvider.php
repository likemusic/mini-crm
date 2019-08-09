<?php

namespace App\Entity\Warehouse\Route;

use App\Contract\Entity\Base\Route\NameProviderInterface;

class NameProvider implements NameProviderInterface
{
    public function getList(): string
    {
        return 'platform.warehouse.list';
    }

    public function getNew(): string
    {
        return 'platform.warehouse.new';
    }

    public function getEdit(): string
    {
        return 'platform.warehouse.edit';
    }
}
