<?php

namespace App\Entity\ProductCategory\HttpControllers;

use App\Entity\ProductCategory\Route\NameProvider;
use App\Entity\Base\HttpControllers\Delete as BaseDeleteController;

class Delete extends BaseDeleteController
{
    public function __construct(NameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }
}
