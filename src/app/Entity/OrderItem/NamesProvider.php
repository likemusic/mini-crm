<?php

namespace App\Entity\OrderItem;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'order-item';
    }

    public function getListDataKey()
    {
        return 'order-items';
    }
}
