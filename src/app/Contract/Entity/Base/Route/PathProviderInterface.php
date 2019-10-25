<?php

namespace App\Contract\Entity\Base\Route;

interface PathProviderInterface
{
    public function getList();
    public function getCreate();
    public function getEdit();
    public function getDelete();
}
