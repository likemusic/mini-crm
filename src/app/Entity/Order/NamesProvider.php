<?php

namespace App\Entity\Order;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'order';
    }

    public function getListDataKey()
    {
        return 'orders';
    }
}
