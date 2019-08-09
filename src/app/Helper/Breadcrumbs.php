<?php

namespace App\Helper;

use App\Contract\BreadcrumbsInterface;

class Breadcrumbs
{
    public function getCreateName(string $createOrUpdateEntity)
    {
        return sprintf(BreadcrumbsInterface::CREATE, $createOrUpdateEntity);
    }

    public function getUpdateName(string $createOrUpdateEntity)
    {
        return sprintf(BreadcrumbsInterface::UPDATE, $createOrUpdateEntity);
    }
}
