<?php

namespace App\Contract\Entity\Base;

interface InfoMessageProviderInterface
{
    public function getCreateMessage(): string;
    public function getUpdateMessage(): string;
    public function getDeleteMessage(): string;
}
