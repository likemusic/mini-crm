<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen as BaseScreen;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

abstract class Base extends BaseScreen
{
    abstract protected function getDataKey(): string;
    abstract protected function getPermissionsClassName(): string;

    /**
     * @return Authenticatable|User
     */
    protected function getCurrentUser(): Authenticatable
    {
        return Auth::user();
    }

    protected function getPermissionClassConstant(string $constantName): string
    {
        $permissionClassName = $this->getPermissionsClassName();

        return $this->getClassConstantValue($permissionClassName, $constantName);
    }

    private function getClassConstantValue($className, $constantName): string
    {
        return constant("{$className}::{$constantName}");
    }
}
