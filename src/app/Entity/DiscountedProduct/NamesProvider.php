<?php

namespace App\Entity\DiscountedProduct;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'discounted-product';
    }

    public function getListDataKey()
    {
        return 'discounted-products';
    }
}
