<?php

use App\Contract\Entity\Permission\Crm\NameInterface as CrmPermissionNameInterface;
use App\Contract\Entity\Role\Field\NameInterface;
use App\Contract\Entity\Role\NameInterface as RoleNameInterface;
use App\Contract\Entity\Role\SlugInterface as RoleSlugInterface;
use App\Helper\PermissionsProvider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Orchid\Platform\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * @var PermissionsProvider
     */
    private $permissionsProvider;

    public function __construct(PermissionsProvider $permissionsProvider)
    {
        $this->permissionsProvider = $permissionsProvider;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allPermissions = $this->getAllPermissions();

        $data = [
            [
                NameInterface::NAME => RoleNameInterface::SUPER_ADMIN,
                NameInterface::SLUG => RoleSlugInterface::SUPER_ADMIN,
                NameInterface::PERMISSIONS => $allPermissions,
            ],
            [
                NameInterface::NAME => RoleNameInterface::ADMIN,
                NameInterface::SLUG => RoleSlugInterface::ADMIN,
                NameInterface::PERMISSIONS => $allPermissions,
            ],
            [
                NameInterface::NAME => RoleNameInterface::COURIER,
                NameInterface::SLUG => RoleSlugInterface::COURIER,
                NameInterface::PERMISSIONS => CrmPermissionNameInterface::COURIER,
            ],
            [
                NameInterface::NAME => RoleNameInterface::WAREHOUSEMAN,
                NameInterface::SLUG => RoleSlugInterface::WAREHOUSEMAN,
                NameInterface::PERMISSIONS => CrmPermissionNameInterface::WAREHOUSEMAN,
            ],
            [
                NameInterface::NAME => RoleNameInterface::ORDER_OPERATOR,
                NameInterface::SLUG => RoleSlugInterface::ORDER_OPERATOR,
                NameInterface::PERMISSIONS => CrmPermissionNameInterface::ORDER_OPERATOR,
            ],
        ];


        foreach ($data as $entityAttributes) {
            $entity = new Role($entityAttributes);
            $entity->save();
        }
    }

    private function getAllPermissions(): Collection
    {
        return $this->permissionsProvider->getAvailablePermissions();
    }
}