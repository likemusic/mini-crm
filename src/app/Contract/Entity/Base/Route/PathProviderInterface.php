<?php

namespace App\Contract\Entity\Base\Route;

interface PathProviderInterface
{
    public function getList();
    public function getNew();
    public function getEdit();
}
