<?php

namespace App\Entity\Settings\Route;

use App\Entity\Base\Route\PathProvider as BasePathProvider;
use App\Entity\Settings\NamesProvider;

class PathProvider extends BasePathProvider
{
    public function __construct(NamesProvider $namesProvider)
    {
        parent::__construct($namesProvider);
    }
}
