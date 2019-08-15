<?php

namespace App\Contract\Entity\Order\Field;

interface LabelInterface
{
    const ID = 'Id';
    const ITEMS = 'Пункты заказа';
    const TOTAL_AMOUNT = 'Итоговая цена';

    const NOTE = 'Примечание';

    const CREATED_AT = 'Дата создания';
    const UPDATED_AT = 'Дата обновления';
}
