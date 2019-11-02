<?php

namespace App\Contract\MainMenu;

interface StructureProviderInterface
{
    public function getTree(): array;
}
