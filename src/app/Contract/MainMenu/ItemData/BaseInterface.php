<?php

namespace App\Contract\MainMenu\ItemData;

interface BaseInterface
{
    public function getPermission(): string;
    public function getIcon(): string;
    public function getLabel(): string;
    public function getSlug(): string;
}
