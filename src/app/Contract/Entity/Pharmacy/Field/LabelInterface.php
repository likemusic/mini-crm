<?php

namespace App\Contract\Entity\Pharmacy\Field;

interface LabelInterface
{
    const ID = 'Id';
    const NAME = 'Наименование';
    const CATEGORY = 'Категория';
    const NOTE = 'Примечание';
    const APPROXIMATE_PRICE = 'Текущая ориентировочная цена';
    const SELLING_PRICE = 'Текущая отпускная цена';
}
