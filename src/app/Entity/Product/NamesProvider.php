<?php

namespace App\Entity\Product;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey(): string
    {
        return 'product';
    }

    public function getListDataKey(): string
    {
        return 'products';
    }
}
