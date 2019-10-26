<?php

namespace App\Entity\User\Route;

use App\Entity\Base\Route\PathProvider as BasePathProvider;
use App\Entity\User\NamesProvider;

class PathProvider extends BasePathProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
