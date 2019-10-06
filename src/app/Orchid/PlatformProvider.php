<?php

declare(strict_types=1);

namespace App\Orchid;

use App\Contract\Entity\Permission\Platform\NameInterface as PermissionNameInterface;
use App\Contract\Entity\Permission\Platform\LabelInterface as PermissionLabelInterface;
use App\Orchid\Composers\MainMenuComposer;
use App\Orchid\Composers\SystemMenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use App\Contract\Entity\PermissionGroup\NameInterface as PermissionGroupNamesInterface;

class PlatformProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard)
    {
        View::composer('platform::dashboard', MainMenuComposer::class);
        View::composer('platform::systems', SystemMenuComposer::class);

        $dashboard
            //->registerPermissions($this->registerPermissionsMain())
            ->registerPermissions($this->registerPermissionsSystems());

        $dashboard->registerGlobalSearch([
            //...Models
        ]);
    }

    /**
     * @return ItemPermission
     */
    protected function registerPermissionsSystems(): ItemPermission
    {
        return ItemPermission::group(__(PermissionGroupNamesInterface::SYSTEMS))
            ->addPermission(PermissionNameInterface::SYSTEMS_ROLES, __(PermissionLabelInterface::SYSTEMS_ROLES))
            ->addPermission(PermissionNameInterface::SYSTEMS_USERS, __(PermissionLabelInterface::SYSTEMS_USERS));
    }

    /**
     * @return ItemPermission
     */
    protected function registerPermissionsMain(): ItemPermission
    {
        return ItemPermission::group(__(PermissionGroupNamesInterface::SYSTEMS))
            ->addPermission(PermissionNameInterface::INDEX, __(PermissionLabelInterface::INDEX))
            ->addPermission(PermissionNameInterface::SYSTEMS, __(PermissionLabelInterface::SYSTEMS))
            ->addPermission(PermissionNameInterface::SYSTEMS_INDEX, __(PermissionLabelInterface::SYSTEMS_INDEX));
    }
}
