<?php

namespace App\Contract\Entity\Base;

interface EditableUseVariantProviderInterface extends NotEditableUseVariantProviderInterface
{
    public function getItemName(): string;
    public function getGenitiveName(): string;
}
