<?php

namespace App\Contract\Screen\Item\CommandBar;

use App\Contract\Common\IconNameInterface;

interface CancelInterface
{
    const NAME = 'Отмена';
    const CLASS_NAME = 'btn btn-default';
    const ICON = IconNameInterface::CLOSE;
}
