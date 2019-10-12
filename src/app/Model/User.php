<?php

namespace App\Model;

use App\Repositories\RoleRepository;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Platform\Models\User as Authenticatable;
use App\Contract\Entity\User\Field\NameInterface;
use App\Contract\Entity\Wallet\Field\NameInterface as WalletFieldNameInterface;
use App\Repositories\UserRepository;
use App\Contract\Entity\Role\SlugInterface as RoleSlugInterface;

class User extends Authenticatable
{
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(
        array $attributes = [])
    {
        $this->roleRepository = app(RoleRepository::class);
        $this->userRepository = app(UserRepository::class);

        parent::__construct($attributes);
    }

    public function wallets()
    {
        return $this->morphMany(Wallet::class, WalletFieldNameInterface::OWNER);
    }

    public function scopeCourier(Builder $query)
    {
        $couriersIds = $this->getCouriersIds();

        return $query->whereIn(NameInterface::ID, $couriersIds);
    }

    private function getCouriersIds()
    {
        $courierRoleId = $this->getCourierRoleId();

        return $this->getUserIdsByRoleId($courierRoleId);
    }

    private function getUserIdsByRoleId(int $roleId): array
    {
        return $this->userRepository->getIdsByRoleId($roleId);
    }

    private function getCourierRoleId(): int
    {
        $courierSlug = RoleSlugInterface::COURIER;

        return $this->getRoleIdByRoleSlug($courierSlug);
    }

    private function getRoleIdByRoleSlug(string $roleSlug):int
    {
        return $this->roleRepository->getRoleIdBySlug($roleSlug);
    }
}
