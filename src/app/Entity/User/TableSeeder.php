<?php

namespace App\Entity\User;

use App\Contract\Entity\Role\SlugInterface as RoleSlugInterface;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;
use App\EntityMeta\DataProvider\PermissionsProvider;
use App\Entity\User\User;
use App\Entity\Role\RoleRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Orchid\Platform\Models\Role;
use App\Contract\Entity\SeedCountInterface;

class TableSeeder extends Seeder
{
    const DEFAULT_PASSWORD = 'qazxsw';

    /**
     * @var PermissionsProvider
     */
    private $permissionsProvider;

    /**
     * @var RoleRepository
     */
    private $roleRepository;

    public function __construct(PermissionsProvider $permissionsProvider, RoleRepository $roleRepository)
    {
        $this->permissionsProvider = $permissionsProvider;
        $this->roleRepository = $roleRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userSeeders = $this->getPerRolesUsersSeeders();
        $this->runSeeders($userSeeders);
//        $this->addAdmins();
//        $this->addCouriers();
//        $this->addOperator();
//        $this->addWarehouseman();
    }

    private function getPerRolesUsersSeeders()
    {
        $roleSlugs = $this->getRolesSlugs();

        return $this->getUsersSeederByRoleSlugs($roleSlugs);
    }



    private function getRolesSlugs()
    {
        return $this->roleRepository->getSlugs();
    }

//    private function addAdmins()
//    {
//        $courierRole = $this->getAdminRole();
//        $maxCouriersCount = SeedCountInterface::USERS_PER_ROLE;
//
//        for ($i = 0; $i < $maxCouriersCount; $i++) {
//            $this->addAdmin($i+1, $courierRole);
//        }
//    }

//    private function addAdmin()
//    {
//        $name = 'admin';
//        $email = env('SEED_ADMIN_EMAIL', 'admin@test.loc');
//        $password = env('SEED_ADMIN_PASSWORD', 'password');
//
//        $this->addAdminUserByCommand($name, $email, $password);
//    }

//    private function addAdminUserByCommand($name, $email, $password)
//    {
//        Artisan::call('orchid:admin', [
//            'name' => $name,
//            'email' => $email,
//            'password' => $password,
//        ]);
//    }

    private function addCouriers()
    {
        $courierRole = $this->getCourierRole();
        $maxCouriersCount = SeedCountInterface::USERS_PER_ROLE;

        for ($i = 0; $i < $maxCouriersCount; $i++) {
            $this->addCourier($i+1, $courierRole);
        }
    }

    private function getAdminRole(): Role
    {
        $courierRoleSlug = RoleSlugInterface::ADMIN;

        return $this->getRoleBySlug($courierRoleSlug);
    }

    private function getCourierRole(): Role
    {
        $courierRoleSlug = RoleSlugInterface::COURIER;

        return $this->getRoleBySlug($courierRoleSlug);
    }

    private function getRoleBySlug(string $roleSlug): Role
    {
        return $this->roleRepository->getRoleBySlug($roleSlug);
    }

    private function addAdmin($i, $adminRole)
    {
        $name = "Admin {$i}";
        $email = "admin{$i}@test.loc";
        $password = self::DEFAULT_PASSWORD;

        $this->addUser($name, $email, $password, $adminRole);
    }

    private function addCourier($i, $courierRole)
    {
        $name = "Courier {$i}";
        $email = "courier{$i}@test.loc";
        $password = self::DEFAULT_PASSWORD;

        $this->addUser($name, $email, $password, $courierRole);
    }

    private function addUser(string $name, string $email, $password, Role $role)
    {
        $attributes = [
            UserFieldNameInterface::NAME => $name,
            UserFieldNameInterface::EMAIL => $email,
            UserFieldNameInterface::PASSWORD => $password,
        ];

        $entity = new User($attributes);
        $entity->save();
        $entity->addRole($role);
    }

    private function addOperator()
    {
        $name = 'Operator';
        $email = 'operator@test.loc';
        $password = self::DEFAULT_PASSWORD;
        $operatorRole = $this->getOperatorRole();

        $this->addUser($name, $email, $password, $operatorRole);
    }

    private function getOperatorRole(): Role
    {
        $courierRoleSlug = RoleSlugInterface::OPERATOR;

        return $this->getRoleBySlug($courierRoleSlug);
    }

    private function addWarehouseman()
    {
        $name = 'Warehouseman';
        $email = 'warehouseman@test.loc';
        $password = self::DEFAULT_PASSWORD;
        $role = $this->getWarehousemanRole();

        $this->addUser($name, $email, $password, $role);
    }

    private function getWarehousemanRole(): Role
    {
        $courierRoleSlug = RoleSlugInterface::WAREHOUSEMAN;

        return $this->getRoleBySlug($courierRoleSlug);
    }
}
