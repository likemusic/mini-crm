<?php

namespace App\Contract\Entity\Role;

interface SlugInterface
{
//    const SUPER_ADMIN = 'superadmin';
    const ADMIN = 'admin';
    const DIRECTOR = 'director';
    const COURIER = 'courier';
    const OPERATOR = 'operator';
    const WAREHOUSEMAN = 'warehouseman';
}
