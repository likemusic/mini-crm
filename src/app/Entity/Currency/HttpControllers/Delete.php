<?php

namespace App\Entity\Currency\HttpControllers;

use App\Entity\Currency\Route\NameProvider;
use App\Entity\Base\HttpControllers\Delete as BaseDeleteController;

class Delete extends BaseDeleteController
{
    public function __construct(NameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }
}
