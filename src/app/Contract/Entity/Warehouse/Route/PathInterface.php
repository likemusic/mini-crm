<?php

namespace App\Contract\Entity\Warehouse\Route;

interface PathInterface
{
    const LIST = 'warehouses';
    const NEW = 'warehouses/new';
    const EDIT = 'warehouses/{warehouse}';
}
