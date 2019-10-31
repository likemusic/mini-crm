<?php

namespace App\MainMenu\Root\Base;

use App\Contract\MainMenu\ItemData\RootInterface as RootMenuItemDataInterface;

class ItemData implements RootMenuItemDataInterface
{
    /** @var string */
    protected $permission;

    /** @var string */
    protected $icon;

    /** @var string */
    protected $label;

    /** @var string */
    protected $slug;

    public function __construct($permission, $icon, $label, $slug)
    {
        $this->permission = $permission;
        $this->icon = $icon;
        $this->label =$label;
        $this->slug = $slug;
    }

    public function getPermission(): string
    {
        return $this->permission;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
