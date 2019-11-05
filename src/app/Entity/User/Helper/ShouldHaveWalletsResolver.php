<?php

namespace App\Entity\User\Helper;

use App\Entity\User\User;
use App\Entity\Role\RoleRepository;
use App\Entity\Role\DataProviders\SlugsWhereWalletsIsRequiredProvider;

class ShouldHaveWalletsResolver
{
    /** @var RoleRepository */
    private $roleRepository;

    /** @var SlugsWhereWalletsIsRequiredProvider */
    private $slugsWhereWalletsIsRequiredProvider;

    public function __construct(
        RoleRepository $roleRepository,
        SlugsWhereWalletsIsRequiredProvider $slugsWhereWalletsIsRequiredProvider
    )
    {
        $this->roleRepository = $roleRepository;
        $this->slugsWhereWalletsIsRequiredProvider = $slugsWhereWalletsIsRequiredProvider;
    }

    public function isUserShouldHaveWallets(User $user)
    {
        $rolesSlugs = $this->getUserRolesSlugs($user);
        $roleSlugsWhereWalletsIsRequired = $this->getRoleSlugsWhereWalletsIsRequired();

        $intersectedSlugs = array_intersect($rolesSlugs, $roleSlugsWhereWalletsIsRequired);

        return (bool) count($intersectedSlugs);
    }

    private function getRoleSlugsWhereWalletsIsRequired()
    {
        return $this->slugsWhereWalletsIsRequiredProvider->getSlugsWhereWalletsIsRequired();
    }

    private function getUserRolesSlugs(User $user)
    {
        return $this->roleRepository->getUserRolesSlugs($user);
    }
}
