<?php

namespace App\Entity\ExchangeRate;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'exchange-rate';
    }

    public function getListDataKey()
    {
        return 'exchange-rates';
    }
}
