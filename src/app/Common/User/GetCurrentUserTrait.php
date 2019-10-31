<?php

namespace App\Common\User;

use App\Entity\User\User;
use Illuminate\Support\Facades\Auth;

trait GetCurrentUserTrait
{
    protected function getCurrentUser(): User
    {
        return Auth::user();
    }
}
