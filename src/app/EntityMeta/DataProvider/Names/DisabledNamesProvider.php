<?php

namespace App\EntityMeta\DataProvider\Names;

use App\Contract\Entity\DisabledNamesInterface;

class DisabledNamesProvider
{
    public function getDisabledEntitiesNames()
    {
        return DisabledNamesInterface::DISABLED_NAMES;
    }
}
