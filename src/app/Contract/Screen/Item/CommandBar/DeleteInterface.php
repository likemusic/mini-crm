<?php

namespace App\Contract\Screen\Item\CommandBar;

use App\Contract\Common\IconNameInterface;

interface DeleteInterface
{
    const NAME = 'Удалить';
    const CLASS_NAME = 'btn btn-danger';
    const ICON = IconNameInterface::TRASH;
}
