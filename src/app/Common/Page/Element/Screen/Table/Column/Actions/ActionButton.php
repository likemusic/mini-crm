<?php

namespace App\Common\Page\Element\Screen\Table\Column\Actions;

use App\Contract\Http\MethodInterface;

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

    /** @var string */
    public $method;

    /** @var string */
    public $onclick;

    public function __construct(
        string $name,
        string $label,
        string $icon,
        string $style,
        string $method = MethodInterface::GET,
        string $onclick = null
    )
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->label = $label;
        $this->style = $style;
        $this->method = $method;
        $this->onclick = $onclick;
    }
}
