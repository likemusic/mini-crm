<?php

namespace App\Contract\Screen\Table\Td\Action;

use App\Contract\Common\ButtonStyle;

interface StyleInterface
{
    const EDIT = ButtonStyle::DEFAULT;
    const DELETE = ButtonStyle::DANGER;
}
