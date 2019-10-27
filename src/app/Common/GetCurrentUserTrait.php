<?php

namespace App\Common;

use App\Model\User;
use Illuminate\Support\Facades\Auth;

trait GetCurrentUserTrait
{
    protected function getCurrentUser(): User
    {
        return Auth::user();
    }
}
