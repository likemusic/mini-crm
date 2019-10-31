<?php

namespace App\Common\Page\Element;

use App\Contract\BreadcrumbsInterface;

class BreadcrumbsHelper
{
    public function getCreateName(string $createOrUpdateEntity)
    {
        return sprintf(BreadcrumbsInterface::CREATE, $createOrUpdateEntity);
    }

    public function getUpdateName(string $createOrUpdateEntity)
    {
        return sprintf(BreadcrumbsInterface::UPDATE, $createOrUpdateEntity);
    }

    public function getListName(string $createOrUpdateEntity)
    {
        return sprintf(BreadcrumbsInterface::LIST, $createOrUpdateEntity);
    }
}
