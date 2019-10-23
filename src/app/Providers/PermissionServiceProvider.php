<?php

namespace App\Providers;

use App\Contract\Entity\Permission\Crm\ProductCategory\LabelInterface as ProductCategoryPermissionLabelInterface;
use App\Contract\Entity\Permission\Crm\ProductCategory\NameInterface as ProductCategoryPermissionNameInterface;
use App\Contract\Entity\Permission\Crm\Product\LabelInterface as ProductPermissionLabelInterface;
use App\Contract\Entity\Permission\Crm\Product\NameInterface as ProductPermissionNameInterface;
use App\Contract\Entity\Permission\Crm\User\LabelInterface as UserPermissionLabelInterface;
use App\Contract\Entity\Permission\Crm\User\NameInterface as UserPermissionNameInterface;
use App\Contract\Entity\Permission\Crm\Role\LabelInterface as RolePermissionLabelInterface;
use App\Contract\Entity\Permission\Crm\Role\NameInterface as RolePermissionNameInterface;
use App\Contract\Entity\Permission\Crm\Role\Type\LabelInterface;
use App\Contract\Entity\Permission\Crm\Role\Type\NameInterface;
use App\Contract\Entity\PermissionGroup\CRM\LabelInterface as CrmPermissionGroupLabelInterface;
use App\Contract\Entity\PermissionGroup\LabelInterface as PermissionGroupLabelInterface;
use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use ReflectionClass;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard)
    {
        $this->registerCrmPermissions($dashboard);
        $this->registerProductPermissions($dashboard);
        $this->registerProductCategoryPermissions($dashboard);
        $this->registerUserPermissions($dashboard);
        $this->registerRolePermissions($dashboard);
    }

    private function registerCrmPermissions(Dashboard $dashboard)
    {
        $this->registerPermissionGroup(
            $dashboard,
            PermissionGroupLabelInterface::CRM,
            NameInterface::class,
            LabelInterface::class
        );
    }

    private function registerPermissionGroup(
        Dashboard $dashboard,
        $groupName,
        $permissionsNamesClassName,
        $permissionsLabelsClassName
    )
    {
        $permissionGroup = ItemPermission::group($groupName);
        $namesClassConstants = $this->getClassConstants($permissionsNamesClassName);
        $labelsClassConstants = $this->getClassConstants($permissionsLabelsClassName);

        foreach ($namesClassConstants as $key => $name) {
            $label = $labelsClassConstants[$key];
            $permissionGroup->addPermission($name, $label);
        }

        $dashboard->registerPermissions($permissionGroup);
    }

    private function getClassConstants($className)
    {
        $reflectionClass = new ReflectionClass($className);

        return $reflectionClass->getConstants();
    }

    private function registerProductCategoryPermissions(Dashboard $dashboard)
    {
        $this->registerPermissionGroup(
            $dashboard,
            CrmPermissionGroupLabelInterface::PRODUCT_CATEGORY,
            ProductCategoryPermissionNameInterface::class,
            ProductCategoryPermissionLabelInterface::class
        );
    }

    private function registerUserPermissions(Dashboard $dashboard)
    {
        $this->registerPermissionGroup(
            $dashboard,
            CrmPermissionGroupLabelInterface::USER,
            UserPermissionNameInterface::class,
            UserPermissionLabelInterface::class
        );
    }

    private function registerRolePermissions(Dashboard $dashboard)
    {
        $this->registerPermissionGroup(
            $dashboard,
            CrmPermissionGroupLabelInterface::ROLE,
            RolePermissionNameInterface::class,
            RolePermissionLabelInterface::class
        );
    }

    private function registerProductPermissions(Dashboard $dashboard)
    {
        $this->registerPermissionGroup(
            $dashboard,
            CrmPermissionGroupLabelInterface::PRODUCT,
            ProductPermissionNameInterface::class,
            ProductPermissionLabelInterface::class
        );
    }
}
