<?php

namespace App\Contract\Entity;

use App\Entity\Product\Product;
use App\Entity\Role\Role;

interface ClassNameInterface
{
    const PRODUCT = Product::class;
    const ROLE = Role::class;
}
