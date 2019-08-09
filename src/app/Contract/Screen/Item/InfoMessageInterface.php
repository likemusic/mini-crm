<?php

namespace App\Contract\Screen\Item;

interface InfoMessageInterface
{
    const UPDATED = 'Изменения %s сохранены.';
    const CREATED = '%s добавлен.';
    const DELETED = '%s удален.';
}
