<?php

namespace App\Entity\Base\Route;

use App\Contract\Entity\Base\Route\NameProviderInterface;
use App\Contract\Entity\Base\NamesProviderInterface;

abstract class NameProvider implements NameProviderInterface
{
    const POSTFIX_LIST = 'list';
    const POSTFIX_NEW = 'new';
    const POSTFIX_EDIT = 'edit';
    const POSTFIX_DELETE = 'delete';

    /** @var NamesProviderInterface  */
    private $namesProvider;

    public function __construct(NamesProviderInterface $namesProvider)
    {
        $this->namesProvider = $namesProvider;
    }

    public function getList(): string
    {
        $baseEntityRouteName = $this->getBaseEntityRouteName();
        $actionPostfix = self::POSTFIX_LIST;

        return $this->getFullRouteName($baseEntityRouteName, $actionPostfix);
    }

    private function getBaseEntityRouteName()
    {
        $baseRouteName = $this->getBaseRouteName();
        $entityRouteName = $this->getEntityRouteName();

        return "{$baseRouteName}.{$entityRouteName}";
    }

    private function getBaseRouteName()
    {
        return 'crm';
    }

    protected function getEntityRouteName(): string
    {
        return $this->namesProvider->getRouteBaseName();
    }

    private function getFullRouteName($baseEntityRouteName, $actionPostfix)
    {
        return "{$baseEntityRouteName}.{$actionPostfix}";
    }

    public function getCreate(): string
    {
        $baseEntityRouteName = $this->getBaseEntityRouteName();
        $actionPostfix = self::POSTFIX_NEW;

        return $this->getFullRouteName($baseEntityRouteName, $actionPostfix);
    }

    public function getEdit(): string
    {
        $baseEntityRouteName = $this->getBaseEntityRouteName();
        $actionPostfix = self::POSTFIX_EDIT;

        return $this->getFullRouteName($baseEntityRouteName, $actionPostfix);
    }

    public function getDelete(): string
    {
        $baseEntityRouteName = $this->getBaseEntityRouteName();
        $actionPostfix = self::POSTFIX_DELETE;

        return $this->getFullRouteName($baseEntityRouteName, $actionPostfix);
    }
}
