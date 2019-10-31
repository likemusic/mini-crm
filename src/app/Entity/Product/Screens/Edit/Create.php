<?php

namespace App\Entity\Product\Screens\Edit;

use App\Entity\Base\Screens\Edit\CreateScreen as BaseCreateScreen;
use App\Entity\Product\Screens\EditTrait;
use App\Entity\Product\Product as Model;

class Create extends BaseCreateScreen
{
    use EditTrait;

    protected function getModelClassName(): string
    {
        return Model::class;
    }
}
