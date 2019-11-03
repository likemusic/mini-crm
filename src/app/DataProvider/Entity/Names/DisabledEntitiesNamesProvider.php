<?php


namespace App\DataProvider\Entity\Names;

use App\Contract\Entity\DisabledNamesInterface;

class DisabledEntitiesNamesProvider
{
    public function getDisabledEntitiesNames()
    {
        return DisabledNamesInterface::DISABLED_NAMES;
    }
}
