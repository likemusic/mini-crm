<?php


namespace App\Entity\User;

use App\Contract\Entity\User\TableInterface;

use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function getIdsByRoleId($roleId): array
    {
        return DB::table('role_users')
            ->where('role_id', $roleId)
            ->pluck('user_id')
            ->toArray();
    }
}
