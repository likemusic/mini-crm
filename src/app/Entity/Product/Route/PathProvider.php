<?php

namespace App\Entity\Product\Route;

use App\Entity\Base\Route\PathProvider as BasePathProvider;
use App\Entity\Product\NamesProvider;

class PathProvider extends BasePathProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
