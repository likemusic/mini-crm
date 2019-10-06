<?php


namespace App\Contract\Entity\Role;

interface NameInterface
{
    const SUPER_ADMIN = 'Суперадминистратор';
    const ADMIN = 'Администратор';
    const COURIER = 'Курьер';
    const ORDER_OPERATOR = 'Оператор принимающий заявки';
    const WAREHOUSEMAN = 'Кладовщик';
}
