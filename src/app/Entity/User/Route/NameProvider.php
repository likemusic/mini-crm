<?php

namespace App\Entity\User\Route;

use App\Entity\Base\Route\NameProvider as BaseNameProvider;
use App\Entity\User\NamesProvider;

class NameProvider extends BaseNameProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
