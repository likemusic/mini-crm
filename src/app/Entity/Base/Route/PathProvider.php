<?php

namespace App\Entity\Base\Route;

use App\Contract\Entity\Base\Route\PathProviderInterface;

abstract class PathProvider implements PathProviderInterface
{
    const POSTFIX_NEW = 'new';
    const POSTFIX_ID = '{id}';

    public function getList()
    {
        return $this->getBasePath();
    }

    abstract protected function getBasePath(): string;

    public function getNew()
    {
        $basePath = $this->getBasePath();
        $actionPostfix = self::POSTFIX_NEW;

        return "{$basePath}/{$actionPostfix}";
    }

    public function getEdit()
    {
        $basePath = $this->getBasePath();
        $postfixId = self::POSTFIX_ID;

        return "{$basePath}/{$postfixId}";
    }
}
