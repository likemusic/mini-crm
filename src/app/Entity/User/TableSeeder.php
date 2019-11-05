<?php

namespace App\Entity\User;

use App\Entity\Role\DataProviders\BySlug\UsersTableSeeder\ClassNameProvider as UsersTableSeederClassNameProvider;
use App\Entity\Role\RoleRepository;
use App\EntityMeta\DataProvider\PermissionsProvider;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * @var PermissionsProvider
     */
    private $permissionsProvider;

    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /** @var UsersTableSeederClassNameProvider */
    private $usersTableSeederClassNameProvider;

    public function __construct(
        PermissionsProvider $permissionsProvider,
        RoleRepository $roleRepository,
        UsersTableSeederClassNameProvider $usersTableSeederClassNameProvider
    )
    {
        $this->permissionsProvider = $permissionsProvider;
        $this->roleRepository = $roleRepository;
        $this->usersTableSeederClassNameProvider = $usersTableSeederClassNameProvider;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userSeederClassNames = $this->getPerRolesUsersSeeders();
        $this->runSeedersByClassNames($userSeederClassNames);
//        $this->addAdmins();
//        $this->addCouriers();
//        $this->addOperator();
//        $this->addWarehouseman();
    }

    private function getPerRolesUsersSeeders()
    {
        $roleSlugs = $this->getRolesSlugs();

        return $this->getUserSeederClassNamesByRoleSlugs($roleSlugs);
    }

    /**
     * @return string[]
     */
    private function getRolesSlugs(): array
    {
        return $this->roleRepository->getSlugs();
    }

    private function getUserSeederClassNamesByRoleSlugs(array $roleSlugs): array
    {
        $userSeederClassNames = [];

        foreach ($roleSlugs as $roleSlug) {
            $userSeederClassNames[] = $this->getUserSeederClassNameByRoleSlug($roleSlug);
        }

        return $userSeederClassNames;
    }

    private function getUserSeederClassNameByRoleSlug(string $roleSlug)
    {
        return $this->usersTableSeederClassNameProvider->getValueByKey($roleSlug);
    }

    private function runSeedersByClassNames(array $userSeederClassNames)
    {
        foreach ($userSeederClassNames as $userSeederClassName) {
            $this->runSeederByClassName($userSeederClassName);
        }
    }

    private function runSeederByClassName(string $userSeederClassName)
    {
        $this->call($userSeederClassName);
    }
}
