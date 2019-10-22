<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen as BaseScreen;

abstract class Base extends BaseScreen
{
    abstract protected function getDataKey(): string;
}
