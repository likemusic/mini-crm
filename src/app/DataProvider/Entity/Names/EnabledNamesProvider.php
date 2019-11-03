<?php

namespace App\DataProvider\Entity\Names;

use App\DataProvider\Entity\NamesProvider;

class EnabledNamesProvider
{
    /** @var DisabledEntitiesNamesProvider */
    private $disabledEntitiesNamesProvider;

    /** @var NamesProvider */
    private $namesProvider;

    public function __construct(
        DisabledEntitiesNamesProvider $disabledEntitiesNamesProvider,
        NamesProvider $namesProvider
    )
    {
        $this->disabledEntitiesNamesProvider = $disabledEntitiesNamesProvider;
        $this->namesProvider = $namesProvider;
    }

    public function getEnabledEntitiesNames()
    {
        $disabledEntitiesNames = $this->getDisabledEntitiesNames();

        $allEntitiesNames = $this->getAllEntitiesNames();

        return array_diff($allEntitiesNames, $disabledEntitiesNames);
    }

    private function getDisabledEntitiesNames()
    {
        return $this->disabledEntitiesNamesProvider->getDisabledEntitiesNames();
    }

    private function getAllEntitiesNames()
    {
        return $this->namesProvider->getEntityNames();
    }
}
