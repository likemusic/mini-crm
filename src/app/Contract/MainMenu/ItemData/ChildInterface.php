<?php

namespace App\Contract\MainMenu\ItemData;

interface ChildInterface extends BaseInterface
{
    public function getRouteName(): ?string;
    public function getTitle(): ?string;
}
