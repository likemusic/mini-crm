<?php

namespace App\Entity\Counteragent;

use App\Entity\Base\NamesProvider as BaseNamesProvider;

class NamesProvider extends BaseNamesProvider
{
    public function getItemDataKey()
    {
        return 'counteragent';
    }

    public function getListDataKey()
    {
        return 'counteragents';
    }
}
