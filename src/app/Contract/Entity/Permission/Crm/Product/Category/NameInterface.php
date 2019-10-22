<?php

namespace App\Contract\Entity\Permission\Crm\Product\Category;

use App\Contract\Entity\Permission\Crm\Product\NameInterface as ProductNameInterface;

interface NameInterface
{
    const LIST = ProductNameInterface::CATEGORY . '.list';
    const CREATE = ProductNameInterface::CATEGORY . '.create';
    const UPDATE = ProductNameInterface::CATEGORY . '.update';
    const DELETE = ProductNameInterface::CATEGORY . '.delete';
}
