<?php

namespace App\Orchid\Screens\Product\Edit;

use App\Entity\Base\Screens\Edit\CreateScreen as BaseCreateScreen;
use App\Orchid\Screens\Product\EditTrait;
use App\Model\Product as Model;

class Create extends BaseCreateScreen
{
    use EditTrait;

    protected function getModelClassName(): string
    {
        return Model::class;
    }
}
