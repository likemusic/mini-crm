<?php

namespace App\NotDbModel\ActionButton;

use App\NotDbModel\ActionButton;

class DeleteButton extends ActionButton
{
    public function __construct(
        string $route,
        string $name = 'delete',
        string $icon = 'trash',
        string $label = 'Delete',
        string $style = 'danger'
    )
    {
        parent::__construct($route, $name, $label, $icon, $style);
    }
}
