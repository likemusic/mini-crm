<?php

namespace App\Entity\User\TableSeeder;

use App\Contract\Entity\Role\SlugInterface as RoleSlugInterface;
use App\Contract\Entity\User\Field\NameInterface as UserFieldNameInterface;
use App\DataProvider\PermissionsProvider;
use App\Entity\User\User;
use App\Entity\Role\RoleRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Orchid\Platform\Models\Role;
use App\Contract\Entity\SeedCountInterface;
use App\Entity\User\Manager as UserManager;

abstract class Base
{
    const DEFAULT_PASSWORD = 'qazxsw';

    private $userManager;

    /**
     * @var RoleRepository
     */
    private $roleRepository;

    public function __construct(
        UserManager $userManager,
        RoleRepository $roleRepository
    )
    {
        $this->userManager = $userManager;
        $this->roleRepository = $roleRepository;
    }

    private function getRoleBySlug(string $roleSlug): Role
    {
        return $this->roleRepository->getRoleBySlug($roleSlug);
    }

    public function seedUsers(int $count)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->seedUser($i);
        }
    }

    private function seedUser(int $i)
    {
        $user = $this->createUser($i);
        $role = $this->getRole();

        $this->addUser($user, $role);
    }

    protected function getRole(): Role
    {
        $roleSlug = $this->getRoleSlug();

        return $this->getRoleBySlug($roleSlug);
    }

    abstract protected function getRoleSlug(): string;

    private function createUser($i)
    {
//        $adminRole = $this->getAdminRole();
//        $maxCouriersCount = SeedCountInterface::USERS_PER_ROLE;
//        $name = "Admin {$i}";
//        $email =  "admin{$i}@test.loc";
        $name = $this->getName($i);
        $email = $this->getEmail($i);
        $password = $this->getPassword($i);

        $attributes = [
            UserFieldNameInterface::NAME => $name,
            UserFieldNameInterface::EMAIL => $email,
            UserFieldNameInterface::PASSWORD => $password,
        ];

        return new User($attributes);
    }

    protected function getEmailFormat()
    {
        $roleSlug = $this->getRoleSlug();

        return "{$roleSlug}%d@test.loc";
    }


    protected function getPassword(int $i)
    {
        return self::DEFAULT_PASSWORD;
    }

    private function getEmail(int $i)
    {
        $emailFormat = $this->getEmailFormat();

        return sprintf($emailFormat, $i);
    }

    protected function getNameFormat()
    {
        $roleSlug = $this->getRoleSlug();
        $name = ucfirst($roleSlug);

        return "{$name}%d";
    }

    private function getName(int $i)
    {
        $nameFormat = $this->getNameFormat();

        return sprintf($nameFormat, $i);
    }

    private function addUser(User $user, Role $role)
    {
        $this->userManager->addUser($user, [$role]);
    }

//    private function addAdmin($i, $adminRole)
//    {
//        $adminRole = $this->getAdminRole();
//        $maxCouriersCount = SeedCountInterface::USERS_PER_ROLE;
//        $name = "Admin {$i}";
//        $email = "admin{$i}@test.loc";
//        $password = self::DEFAULT_PASSWORD;
//
//        $this->addUserByParams($name, $email, $password, $adminRole);
//    }

//    private function addUserByParams(string $name, string $email, $password, Role $role)
//    {
//        $entity->save();
//        $entity->addRole($role);
//    }

}
