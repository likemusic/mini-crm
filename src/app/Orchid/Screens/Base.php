<?php

namespace App\Orchid\Screens;

use App\Common\GetCurrentUserTrait;
use App\Common\GetPermissionClassConstantTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Screen as BaseScreen;

abstract class Base extends BaseScreen
{
    use GetPermissionClassConstantTrait;
    use GetCurrentUserTrait;

    public function __construct(?Request $request = null)
    {
        parent::__construct($request);

        $this->permission = $this->getPermission();
    }

    protected function getPermission(): string
    {
        $constantName = $this->getPermissionClassConstantName();

        return $this->getPermissionClassConstant($constantName);
    }

    abstract protected function getPermissionClassConstantName(): string;

    abstract protected function getDataKey(): string;
}
