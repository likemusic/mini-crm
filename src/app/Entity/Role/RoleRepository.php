<?php


namespace App\Entity\Role;

use Illuminate\Support\Facades\DB;
use App\Contract\Entity\Role\Field\NameInterface;
use App\Contract\Entity\Role\TableInterface;
use Orchid\Platform\Models\Role;
use App\Entity\User\User;

class RoleRepository
{
    /**
     * @var Role
     */
    private $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function getSlugs(): array
    {
        return $this->model->newQuery()->pluck(NameInterface::NAME)->toArray();
    }

    public function getRoleIdBySlug($slug): int
    {
        $idFieldName = NameInterface::ID;

        $data = DB::table(TableInterface::NAME)
            ->where(NameInterface::SLUG, $slug)
            ->first($idFieldName);

        return $data->{$idFieldName};
    }

    public function getRoleBySlug($roleSlug):Role
    {
        return $this->model->where(NameInterface::SLUG, $roleSlug)->first();
    }

    public function getUserRolesSlugs(User $user)
    {
        return $user->roles()->pluck(NameInterface::SLUG)->toArray();
    }
}
