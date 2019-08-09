<?php

namespace App\Orchid\Screens\Base;

use Orchid\Screen\Screen as BaseScreen;

abstract class Screen extends BaseScreen
{
    abstract protected function getDataKey(): string;
}
