<?php

namespace App\Base;

use App\Common\User\GetCurrentUserTrait;
use App\Common\Permission\GetPermissionClassConstantTrait;
use Illuminate\Http\Request;
use Orchid\Screen\Screen as BaseScreen;

abstract class Screen extends BaseScreen
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
