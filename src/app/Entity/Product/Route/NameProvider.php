<?php

namespace App\Entity\Product\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;
use App\Entity\Product\NamesProvider;

class NameProvider extends BaseNameProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
