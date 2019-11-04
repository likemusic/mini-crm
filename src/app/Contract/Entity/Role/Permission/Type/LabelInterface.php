<?php

namespace App\Contract\Entity\Role\Permission\Type;

interface LabelInterface
{
    const SUPER_ADMIN = 'Суперадмин';
    const ADMIN = 'Админ';
    const COURIER = 'Курьер';
    const ORDER_OPERATOR = 'Оператор (приёма заказов)';
    const WAREHOUSEMAN = 'Кладовщик';
}