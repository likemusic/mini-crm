<?php

namespace App\Entity\Base\Route;

use App\Contract\Entity\Base\Route\PathProviderInterface;
use App\Contract\Entity\Base\NamesProviderInterface;

abstract class PathProvider implements PathProviderInterface
{
    const POSTFIX_NEW = 'new';

    /**
     * @var NamesProviderInterface
     */
    private $namesProvider;

    public function __construct(NamesProviderInterface $namesProvider)
    {
        $this->namesProvider = $namesProvider;
    }

    private function getIdPlaceholder(): string
    {
        $routePlaceholder = $this->getRoutePlaceholder();

        return '{' . $routePlaceholder . '}';
    }

    private function getRoutePlaceholder()
    {
        return $this->namesProvider->getRoutePlaceholder();
    }

    public function getList()
    {
        return $this->getBasePath();
    }

    protected function getBasePath(): string
    {
        return $this->namesProvider->getRouteBasePath();
    }

    public function getCreate()
    {
        $basePath = $this->getBasePath();
        $actionPostfix = self::POSTFIX_NEW;

        return "{$basePath}/{$actionPostfix}";
    }

    public function getEdit()
    {
        $basePath = $this->getBasePath();
        $postfixId = $this->getIdPlaceholder();

        return "{$basePath}/{$postfixId}/edit";
    }

    public function getDelete()
    {
        $basePath = $this->getBasePath();
        $postfixId = $this->getIdPlaceholder();

        return "{$basePath}/{$postfixId}/delete";
    }
}
