<?php

namespace App\DataProvider;

use Illuminate\Support\Collection;
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

    public function getAvailablePermissions(): array
    {
        return $this->getAvailablePermissionsCollection()->toArray();
    }

    public function getAvailablePermissionsSlugs()
    {
        $availablePermissions = $this->getAvailablePermissions();

        $slugs = [];

        foreach ($availablePermissions as $permissionGroupName => $groupPermissions) {
            $groupSlugs = $this->getPermissionsSlugsByPermissions($groupPermissions);
            $slugs = array_merge($slugs, $groupSlugs);
        }

        return $slugs;
    }

    private function getPermissionsSlugsByPermissions($groupPermissions)
    {
        $slugs = [];

        foreach ($groupPermissions as $permission) {
            $slugs[] = $permission['slug'];
        }

        return $slugs;
    }

    private function getAvailablePermissionsCollection(): Collection
    {
        return $this->dashboard->getPermission();
    }

}
