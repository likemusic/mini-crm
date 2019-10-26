<?php

namespace App\Entity\ProductCategory;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey(): string
    {
        return 'product-category';
    }

    public function getListDataKey(): string
    {
        return 'product-categories';
    }
}
