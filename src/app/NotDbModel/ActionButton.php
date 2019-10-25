<?php


namespace App\NotDbModel;

class ActionButton
{
    /** @var string */
    public $name;

    /** @var string */
    public $route;

    /** @var string */
    public $icon;

    /** @var string */
    public $label;

    /** @var string */
    public $style;

    public function __construct(string $route, string $name, string $label, string $icon, string $style)
    {
        $this->name = $name;
        $this->route = $route;
        $this->icon = $icon;
        $this->label = $label;
        $this->style = $style;
    }
}
