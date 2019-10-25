<?php

namespace App\Entity\ProductQuote;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'product-quote';
    }

    public function getListDataKey()
    {
        return 'product-quotes';
    }
}
