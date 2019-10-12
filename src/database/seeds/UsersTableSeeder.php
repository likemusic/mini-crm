<?php

use App\Contract\Entity\Role\SlugInterface as RoleSlugInterface;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;
use App\Helper\PermissionsProvider;
use App\Model\User;
use App\Repositories\RoleRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Orchid\Platform\Models\Role;

class UsersTableSeeder extends Seeder
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
        $this->addAdmin();
        $this->addCouriers();
        $this->addOperator();
        $this->addWarehouseman();
    }

    private function addAdmin()
    {
        $name = 'admin';
        $email = env('SEED_ADMIN_EMAIL', 'admin@test.loc');
        $password = env('SEED_ADMIN_PASSWORD', 'password');

        $this->addAdminUserByCommand($name, $email, $password);
    }

    private function addAdminUserByCommand($name, $email, $password)
    {
        Artisan::call('orchid:admin', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }

    private function addCouriers()
    {
        $courierRole = $this->getCourierRole();
        $maxCouriersCount = SeedCountInterface::USERS_COURIERS;

        for($i = 0; $i < $maxCouriersCount; $i++) {
            $this->addCourier($i, $courierRole);
        }
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
        $courierRoleSlug = RoleSlugInterface::ORDER_OPERATOR;

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
