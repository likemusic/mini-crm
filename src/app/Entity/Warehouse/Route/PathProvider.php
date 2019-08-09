<?php

namespace App\Entity\Warehouse\Route;

use App\Contract\Entity\Base\Route\PathProviderInterface;

class PathProvider implements PathProviderInterface
{
    public function getList()
    {
        return 'warehouses';
    }

    public function getNew()
    {
        return 'warehouses/new';
    }

    public function getEdit()
    {
        return 'warehouses/{product}';
    }
}
