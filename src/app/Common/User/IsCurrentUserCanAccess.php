<?php

namespace App\Common\User;

trait IsCurrentUserCanAccess
{
    use GetCurrentUserTrait;

    protected function isCurrentUserHasAccess(string $permission)
    {
        $currentUser = $this->getCurrentUser();

        return $currentUser->hasAccess($permission);
    }
}
