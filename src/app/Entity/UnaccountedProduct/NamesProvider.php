<?php

namespace App\Entity\UnaccountedProduct;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'unaccounted-product';
    }

    public function getListDataKey()
    {
        return 'unaccounted-products';
    }
}
