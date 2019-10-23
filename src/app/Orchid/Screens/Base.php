<?php

namespace App\Orchid\Screens;

use Illuminate\Http\Request;
use Orchid\Screen\Screen as BaseScreen;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

abstract class Base extends BaseScreen
{
    abstract protected function getDataKey(): string;
    abstract protected function getPermissionsClassName(): string;
    abstract protected function getPermissionClassConstantName(): string;

    protected function getPermission(): string
    {
        $constantName = $this->getPermissionClassConstantName();

        return $this->getPermissionClassConstant($constantName);
    }


    public function __construct(?Request $request = null)
    {
        parent::__construct($request);

        $this->permission = $this->getPermission();
    }

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
