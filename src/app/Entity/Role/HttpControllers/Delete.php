<?php

namespace App\Entity\Role\HttpControllers;

use App\Entity\Role\Route\NameProvider;
use App\Entity\Base\HttpControllers\Delete as BaseDeleteController;

class Delete extends BaseDeleteController
{
    public function __construct(NameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }
}
