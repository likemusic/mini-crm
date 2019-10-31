<?php

namespace App\Common;

use ReflectionClass;
use ReflectionException;

class ReflectionHelper
{
    /**
     * @param $className
     * @return array
     * @throws ReflectionException
     */
    public function getClassConstants($className)
    {
        $reflectionClass = new ReflectionClass($className);

        return $reflectionClass->getConstants();
    }
}
