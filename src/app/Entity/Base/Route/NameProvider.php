<?php

namespace App\Entity\Base\Route;

use App\Contract\Entity\Base\Route\NameProviderInterface;

abstract class NameProvider implements NameProviderInterface
{
    const POSTFIX_LIST = 'list';
    const POSTFIX_NEW = 'new';
    const POSTFIX_EDIT = 'edit';

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
        return 'platform';
    }

    abstract protected function getEntityRouteName(): string;

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

    public function getUpdate(): string
    {
        $baseEntityRouteName = $this->getBaseEntityRouteName();
        $actionPostfix = self::POSTFIX_EDIT;

        return $this->getFullRouteName($baseEntityRouteName, $actionPostfix);
    }
}
