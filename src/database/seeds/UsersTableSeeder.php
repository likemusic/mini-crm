<?php

use App\Helper\PermissionsProvider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class UsersTableSeeder extends Seeder
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
        $this->addAdmin();
    }

    private function addAdmin()
    {
        $name = 'admin';
        $email = env('SEED_ADMIN_EMAIL', 'admin@test.loc');
        $password = env('SEED_ADMIN_PASSWORD', 'password');

        $this->addUser($name, $email, $password);
    }

    private function addUser($name, $email, $password)
    {
        Artisan::call('orchid:admin', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }
}
