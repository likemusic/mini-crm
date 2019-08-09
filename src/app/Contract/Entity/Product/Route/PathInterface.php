<?php

namespace App\Contract\Entity\Product\Route;

use App\Contract\Entity\Base\Route\PathProviderInterface;

interface PathInterface
{
    public function getList();
    public function getNew();
    public function getEdit();
}
