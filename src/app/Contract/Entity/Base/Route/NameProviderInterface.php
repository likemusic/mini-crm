<?php

namespace App\Contract\Entity\Base\Route;

interface NameProviderInterface
{
    public function getList(): string;
    public function getCreate(): string;
    public function getUpdate(): string;
}
