<?php

namespace App\Contract\Base;

interface DataProviderInterface
{
    public function getValueByKey(string $key);
}
