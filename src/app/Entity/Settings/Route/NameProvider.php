<?php

namespace App\Entity\Settings\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;
use App\Entity\Settings\NamesProvider;

class NameProvider extends BaseNameProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
