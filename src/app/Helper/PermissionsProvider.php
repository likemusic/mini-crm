<?php

namespace App\Helper;

use Orchid\Platform\Dashboard;

class PermissionsProvider
{
    /**
     * @var Dashboard
     */
    private $dashboard;

    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    public function getAvailablePermissions()
    {
        return $this->dashboard->getPermission();
    }
}
