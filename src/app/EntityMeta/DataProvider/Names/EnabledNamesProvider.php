<?php

namespace App\EntityMeta\DataProvider\Names;

use App\EntityMeta\DataProvider\Names\AllNamesProvider;
use App\EntityMeta\DataProvider\Names\DisabledNamesProvider;

class EnabledNamesProvider
{
    /** @var DisabledNamesProvider */
    private $disabledNamesProvider;

    /** @var AllNamesProvider */
    private $allNamesProvider;

    public function __construct(
        DisabledNamesProvider $disabledNamesProvider,
        AllNamesProvider $allNamesProvider
    )
    {
        $this->disabledNamesProvider = $disabledNamesProvider;
        $this->allNamesProvider = $allNamesProvider;
    }

    public function getEnabledEntitiesNames()
    {
        $disabledEntitiesNames = $this->getDisabledEntitiesNames();

        $allEntitiesNames = $this->getAllEntitiesNames();

        return array_diff($allEntitiesNames, $disabledEntitiesNames);
    }

    private function getDisabledEntitiesNames()
    {
        return $this->disabledNamesProvider->getDisabledEntitiesNames();
    }

    private function getAllEntitiesNames()
    {
        return $this->allNamesProvider->getEntityNames();
    }
}
