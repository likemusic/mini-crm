<?php

namespace App\Entity\Warehouse;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'warehouse';
    }

    public function getListDataKey()
    {
        return 'warehouses';
    }
}
