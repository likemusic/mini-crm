<?php

namespace App\Contract\Entity\Base\Route;

interface NameProviderInterface
{
    public function getList(): string;
    public function getNew(): string;
    public function getEdit(): string;
}
