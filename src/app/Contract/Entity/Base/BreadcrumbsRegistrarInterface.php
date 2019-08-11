<?php

namespace App\Contract\Entity\Base;

use App\Contract\Entity\Base\Route\NameProviderInterface;

interface BreadcrumbsRegistrarInterface
{
    public function register();
}
