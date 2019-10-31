<?php

namespace App\Contract\Screen\Table\CommandBar;

use App\Contract\Common\IconNameInterface;

interface AddInterface
{
    const NAME = 'Добавить';
    const ICON = IconNameInterface::PLUS;
    const CLASS_ATTRIBUTE = 'btn btn-primary';
}
