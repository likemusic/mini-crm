<?php

namespace App\Entity\ProductCategory;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'product-category';
    }

    public function getListDataKey()
    {
        return 'product-categories';
    }
}
