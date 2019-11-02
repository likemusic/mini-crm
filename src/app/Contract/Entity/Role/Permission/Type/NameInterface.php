<?php

namespace App\Contract\Entity\Role\Permission\Type;

/**
 * Interface PermissionInterface
 */
interface NameInterface
{
    const SUPER_ADMIN = 'superadmin';
    const ADMIN = 'admin';
    const COURIER = 'courier';
    const ORDER_OPERATOR = 'order_operator';
    const WAREHOUSEMAN = 'warehouseman';
}
