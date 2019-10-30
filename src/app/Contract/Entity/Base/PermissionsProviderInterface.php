<?php

namespace App\Contract\Entity\Base;

interface PermissionsProviderInterface
{
    public function getList(): string;
    public function getCreate(): string;
    public function getUpdate(): string;
    public function getDelete(): string;
}
