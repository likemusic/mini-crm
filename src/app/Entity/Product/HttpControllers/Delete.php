<?php

namespace App\Entity\Product\HttpControllers;

use App\Entity\Product\Route\NameProvider;
use App\Entity\Base\HttpControllers\Delete as BaseDeleteController;

class Delete extends BaseDeleteController
{
    public function __construct(NameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }
}
