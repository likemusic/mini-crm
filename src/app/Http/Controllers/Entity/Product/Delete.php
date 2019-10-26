<?php

namespace App\Http\Controllers\Entity\Product;

use App\Entity\Product\Route\NameProvider;
use App\Http\Controllers\Entity\Base\Delete as BaseDeleteController;

class Delete extends BaseDeleteController
{
    public function __construct(NameProvider $routeNameProvider)
    {
        parent::__construct($routeNameProvider);
    }
}
