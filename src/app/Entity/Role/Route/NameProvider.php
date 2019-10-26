<?php

namespace App\Entity\Role\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;
use App\Entity\Role\NamesProvider;

class NameProvider extends BaseNameProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
