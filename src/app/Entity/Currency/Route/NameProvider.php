<?php

namespace App\Entity\Currency\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;
use App\Entity\Currency\NamesProvider;

class NameProvider extends BaseNameProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
