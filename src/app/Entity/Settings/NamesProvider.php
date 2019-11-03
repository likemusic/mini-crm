<?php

namespace App\Entity\Settings;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey(): string
    {
        return 'setting';
    }

    public function getListDataKey(): string
    {
        return 'settings';
    }
}
