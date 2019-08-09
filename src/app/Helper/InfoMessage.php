<?php

namespace App\Helper;

use App\Contract\Screen\Item\InfoMessageInterface;

class InfoMessage
{
    public function getUpdateMessage(string $entityName)
    {
        return sprintf(InfoMessageInterface::UPDATED, $entityName);
    }

    public function getCreateMessage(string $entityName)
    {
        return sprintf(InfoMessageInterface::CREATED, $entityName);
    }

    public function getDeletedMessage(string $entityName)
    {
        return sprintf(InfoMessageInterface::DELETED, $entityName);
    }
}
