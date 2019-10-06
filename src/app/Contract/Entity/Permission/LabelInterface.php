<?php

namespace App\Contract\Entity\Permission;


interface LabelInterface
{
    const SUPER_ADMIN = 'Суперадминистратор';
    const ADMIN = 'Администратор';
    const COURIER = 'Курьер';
    const ORDER_OPERATOR = 'Оператор (принимающий заявки)';
    const WAREHOUSEMAN = 'Кладовщик';
}
