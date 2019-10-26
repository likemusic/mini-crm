<?php

namespace App\Entity\ProductCategory\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;
use App\Entity\ProductCategory\NamesProvider;

class NameProvider extends BaseNameProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
