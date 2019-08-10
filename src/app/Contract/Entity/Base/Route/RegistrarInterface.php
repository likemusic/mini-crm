<?php

namespace App\Contract\Entity\Base\Route;

use Illuminate\Contracts\Routing\Registrar as RoutingRegistrarInterface;

interface RegistrarInterface
{
    public function registerRoutes(RoutingRegistrarInterface $router);
}
