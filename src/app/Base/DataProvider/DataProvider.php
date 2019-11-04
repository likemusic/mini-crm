<?php

namespace App\Base\DataProvider;

use InvalidArgumentException;
use App\Contract\Base\DataProviderInterface;

abstract class DataProvider implements DataProviderInterface
{
    public function getValueByKey(string $key)
    {
        $map = $this->getMap();
        $this->validateKey($map, $key);

        return $map[$key];
    }

    abstract protected function getMap(): array;

    protected function validateKey(array $map, string $key)
    {
        if (!array_key_exists($key, $map)) {
            $errorMessage = $this->getErrorMessage($key);
            throw new InvalidArgumentException($errorMessage);
        }
    }

    protected function getErrorMessage(string $key)
    {
        return 'Invalid key value: ' . $key;
    }
}
