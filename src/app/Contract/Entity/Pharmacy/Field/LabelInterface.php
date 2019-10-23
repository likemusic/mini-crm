<?php

namespace App\Contract\Entity\Pharmacy\Field;

use App\Contract\Entity\Base\Field\Label\IdInterface;
use App\Contract\Entity\Base\Field\Label\NoteInterface;
use App\Contract\Entity\Base\Field\Label\NameInterface;

interface LabelInterface extends IdInterface, NoteInterface, NameInterface
{
    const CATEGORY = 'Категория';
    const APPROXIMATE_PRICE = 'Ориентировочная цена';
    const SELLING_PRICE = 'Отпускная цена';

    const WAREHOUSES_TOTAL_QUANTITY = 'Общее кол-во на складах';
    const WAREHOUSES_TOTAL_AMOUNT = 'Общая стоимость на складах';
}
