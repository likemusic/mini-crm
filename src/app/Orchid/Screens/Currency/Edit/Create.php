<?php

namespace App\Orchid\Screens\Currency\Edit;

use App\Orchid\Screens\Base\Edit\CreateScreen as BaseCreateScreen;
use App\Orchid\Screens\Currency\EditTrait;
use App\Model\Currency as Model;

class Create extends BaseCreateScreen
{
    use EditTrait;

    protected function getModelClassName(): string
    {
        return Model::class;
    }
}
