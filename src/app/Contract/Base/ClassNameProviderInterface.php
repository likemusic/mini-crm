<?php

namespace App\Contract\Base;

interface ClassNameProviderInterface extends DataProviderInterface
{
    public function getValueByKey(string $key): string;
}
