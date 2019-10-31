<?php

namespace App\Contract\Screen\Item\CommandBar;

use App\Contract\Common\IconNameInterface;

interface UpdateInterface
{
    const NAME = 'Сохранить';
    const CLASS_NAME = 'btn btn-primary';
    const ICON = IconNameInterface::SAVE;
}
