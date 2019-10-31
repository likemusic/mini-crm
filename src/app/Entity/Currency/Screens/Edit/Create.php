<?php

namespace App\Entity\Currency\Screens\Edit;

use App\Entity\Base\Screens\Edit\CreateScreen as BaseCreateScreen;
use App\Entity\Currency\Screens\EditTrait;
use App\Entity\Currency\Currency as Model;

class Create extends BaseCreateScreen
{
    use EditTrait;

    protected function getModelClassName(): string
    {
        return Model::class;
    }
}
