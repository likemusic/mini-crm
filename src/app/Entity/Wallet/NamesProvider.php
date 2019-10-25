<?php

namespace App\Entity\Wallet;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'wallet';
    }

    public function getListDataKey()
    {
        return 'wallets';
    }
}
