<?php

namespace App\Entity\Currency;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'currency';
    }

    public function getListDataKey()
    {
        return 'currencies';
    }
}
