<?php

namespace App\Entity\Pharmacy;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'pharmacy';
    }

    public function getListDataKey()
    {
        return 'pharmacies';
    }
}
