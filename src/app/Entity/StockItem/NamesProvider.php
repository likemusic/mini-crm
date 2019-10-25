<?php

namespace App\Entity\StockItem;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'stock-item';
    }

    public function getListDataKey()
    {
        return 'stock-items';
    }
}
