<?php

namespace App\Providers;

use App\Contract\Entity\Permission\Crm\Role\LabelInterface;
use App\Contract\Entity\Permission\Crm\Role\NameInterface;
use App\Contract\Entity\PermissionGroup\NameInterface as PermissionGroupNameInterface;
use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard)
    {
        $permissions = ItemPermission::group(PermissionGroupNameInterface::CRM)
            ->addPermission(NameInterface::SUPER_ADMIN, LabelInterface::SUPER_ADMIN)
            ->addPermission(NameInterface::ADMIN, LabelInterface::ADMIN)
            ->addPermission(NameInterface::ORDER_OPERATOR, LabelInterface::ORDER_OPERATOR)
            ->addPermission(NameInterface::WAREHOUSEMAN, LabelInterface::WAREHOUSEMAN)
            ->addPermission(NameInterface::COURIER, LabelInterface::COURIER);

        $dashboard->registerPermissions($permissions);
    }
}
