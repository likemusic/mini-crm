<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\Dashboard;
use App\Contract\Entity\PermissionGroup\NameInterface as PermissionGroupNameInterface;
use App\Contract\Entity\Permission\Crm\NameInterface;
use App\Contract\Entity\Permission\Crm\LabelInterface;

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
            ->addPermission(NameInterface::COURIER, LabelInterface::COURIER)
        ;

        $dashboard->registerPermissions($permissions);
    }
}
