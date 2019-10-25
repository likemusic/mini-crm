<?php


namespace App\NotDbModel;

class ActionButton
{
    /** @var string */
    public $name;

    /** @var string */
    public $icon;

    /** @var string */
    public $label;

    /** @var string */
    public $style;

    /**
     * @var string
     */
    public $onclick;

    public function __construct(string $name, string $label, string $icon, string $style, string $onclick = null)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->label = $label;
        $this->style = $style;
        $this->onclick = $onclick;
    }
}
