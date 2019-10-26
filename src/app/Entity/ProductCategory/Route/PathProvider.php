<?php

namespace App\Entity\ProductCategory\Route;

use App\Entity\Base\Route\PathProvider as BasePathProvider;
use App\Entity\ProductCategory\NamesProvider;

class PathProvider extends BasePathProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
