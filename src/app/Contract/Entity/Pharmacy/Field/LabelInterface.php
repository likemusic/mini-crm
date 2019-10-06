<?php

namespace App\Contract\Entity\Pharmacy\Field;

interface LabelInterface
{
    const ID = 'Id';
    const NAME = 'Наименование';
    const CATEGORY = 'Категория';
    const NOTE = 'Примечание';
    const APPROXIMATE_PRICE = 'Ориентировочная цена';
    const SELLING_PRICE = 'Отпускная цена';

    const WAREHOUSES_TOTAL_QUANTITY = 'Общее кол-во на складах';
    const WAREHOUSES_TOTAL_AMOUNT = 'Общая стоимость на складах';
}
