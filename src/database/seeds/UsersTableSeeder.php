<?php

use App\Helper\PermissionsProvider;
use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use App\Contract\Entity\Permission\Crm\NameInterface as CrmPermissionNameInterface;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;

class UsersTableSeeder extends Seeder
{
    const DEFAULT_PASSWORD = 'qazxsw';

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
        $this->addAdmin();
        $this->addCourier();
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

    private function addCourier()
    {
        $name = 'Courier';
        $email = 'courier@test.loc';
        $permissions = [CrmPermissionNameInterface::COURIER];
        $password = self::DEFAULT_PASSWORD;

        $this->addUser($name, $email, $password, $permissions);
    }

    private function addUser(string $name, string $email, $password, $permissions)
    {
        $attributes = [
            UserFieldNameInterface::NAME => $name,
            UserFieldNameInterface::EMAIL => $email,
            UserFieldNameInterface::PASSWORD => $password,
            UserFieldNameInterface::PERMISSIONS => $permissions,
        ];

        $entity = new User($attributes);
        $entity->save();
    }

    private function addOperator()
    {
        $name = 'Operator';
        $email = 'operator@test.loc';
        $permissions = [CrmPermissionNameInterface::ORDER_OPERATOR];
        $password = self::DEFAULT_PASSWORD;

        $this->addUser($name, $email, $password, $permissions);
    }

    private function addWarehouseman()
    {
        $name = 'Warehouseman';
        $email = 'warehouseman@test.loc';
        $permissions = [CrmPermissionNameInterface::WAREHOUSEMAN];
        $password = self::DEFAULT_PASSWORD;

        $this->addUser($name, $email, $password, $permissions);
    }
}
