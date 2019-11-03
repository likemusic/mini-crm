<?php

namespace App\Common\User;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

trait GetCurrentUserTrait
{
    protected function getCurrentUser(): Authenticatable
    {
        return Auth::user();
    }
}
