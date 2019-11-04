<?php

namespace App\Entity\Role;

use App\Contract\Entity\Role\Permission\Type\NameInterface as CrmPermissionNameInterface;
use App\Contract\Entity\Role\Field\NameInterface;
use App\Contract\Entity\Role\NameInterface as RoleNameInterface;
use App\Contract\Entity\Role\SlugInterface as RoleSlugInterface;
use App\DataProvider\PermissionsProvider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Orchid\Platform\Models\Role;

class TableSeeder extends Seeder
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
        $allPermissionsSlugs = $this->getAllPermissionsSlugs();
        $allPermissions = array_fill_keys($allPermissionsSlugs, true);

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
                NameInterface::PERMISSIONS => [CrmPermissionNameInterface::COURIER => true],
            ],
            [
                NameInterface::NAME => RoleNameInterface::WAREHOUSEMAN,
                NameInterface::SLUG => RoleSlugInterface::WAREHOUSEMAN,
                NameInterface::PERMISSIONS => [CrmPermissionNameInterface::WAREHOUSEMAN => true],
            ],
            [
                NameInterface::NAME => RoleNameInterface::ORDER_OPERATOR,
                NameInterface::SLUG => RoleSlugInterface::ORDER_OPERATOR,
                NameInterface::PERMISSIONS => [CrmPermissionNameInterface::ORDER_OPERATOR => true],
            ],
        ];


        foreach ($data as $entityAttributes) {
            $entity = new Role($entityAttributes);
            $entity->save();
        }
    }

    private function getAllPermissionsSlugs(): array
    {
        return $this->permissionsProvider->getAvailablePermissionsSlugs();
    }
}
