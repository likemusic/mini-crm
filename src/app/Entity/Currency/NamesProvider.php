<?php

namespace App\Entity\Currency;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey(): string
    {
        return 'currency';
    }

    public function getListDataKey(): string
    {
        return 'currencies';
    }
}
