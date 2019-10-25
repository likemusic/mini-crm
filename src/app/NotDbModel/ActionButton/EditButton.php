<?php

namespace App\NotDbModel\ActionButton;

use App\NotDbModel\ActionButton;

class EditButton extends ActionButton
{
    public function __construct(
        string $route,
        string $name = 'edit',
        string $icon = 'pencil',
        string $label = 'Edit',
        string $style = 'default'
    )
    {
        parent::__construct($route, $name, $label, $icon, $style);
    }
}
