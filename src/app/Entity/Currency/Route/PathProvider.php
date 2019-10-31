<?php

namespace App\Entity\Currency\Route;

use App\Entity\Base\Route\PathProvider as BasePathProvider;
use App\Entity\Currency\NamesProvider;

class PathProvider extends BasePathProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
