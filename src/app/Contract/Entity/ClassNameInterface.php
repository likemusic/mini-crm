<?php

namespace App\Contract\Entity;

use App\Model\Product;
use App\Model\Role;

interface ClassNameInterface
{
    const PRODUCT = Product::class;
    const ROLE = Role::class;
}
