<?php

namespace App\Contract\Entity\Product\Route;

interface PathInterface
{
    const LIST = 'products';
    const NEW = 'products/new';
    const EDIT = 'products/{product}';
}
