<?php

namespace App\Entity\Role\Route;

use App\Entity\Base\Route\PathProvider as BasePathProvider;
use App\Entity\Role\NamesProvider;

class PathProvider extends BasePathProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
