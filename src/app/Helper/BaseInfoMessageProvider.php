<?php

namespace App\Helper;

use App\Contract\Entity\Base\InfoMessageProviderInterface;
use App\Contract\Entity\Base\UseVariantProvider\CrudInterface as CrudUseVariantProviderInterface;
use App\Helper\InfoMessage as InfoMessageHelper;

class BaseInfoMessageProvider implements InfoMessageProviderInterface
{
    /**
     * @var InfoMessageHelper
     */
    private $infoMessageHelper;

    /**
     * @var CrudUseVariantProviderInterface
     */
    private $useVariant;

    public function __construct(InfoMessageHelper $infoMessageHelper, CrudUseVariantProviderInterface $useVariant)
    {
        $this->infoMessageHelper = $infoMessageHelper;
        $this->useVariant = $useVariant;
    }

    public function getCreateMessage(): string
    {
        $itemName = $this->getItemName();

        return $this->infoMessageHelper->getCreateMessage($itemName);
    }

    private function getItemName()
    {
        return $this->useVariant->getItemName();
    }

    public function getUpdateMessage(): string
    {
        $itemName = $this->getGenitiveName();
        return $this->infoMessageHelper->getUpdateMessage($itemName);
    }

    private function getGenitiveName()
    {
        return $this->useVariant->getGenitiveName();
    }

    public function getDeleteMessage(): string
    {
        $itemName = $this->getItemName();

        return $this->infoMessageHelper->getDeletedMessage($itemName);
    }
}
