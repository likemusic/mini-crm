<?php

namespace App\Menu\Main;

use App\Contract\MainMenu\Permission\ToCrmPermissionMapInterface;
use InvalidArgumentException;

class PermissionToCrmPermissionsConverter
{
    public function getCrmPermissionByMainMenuPermission(string $mainMenuPermission): array
    {
        $map = ToCrmPermissionMapInterface::MAP;

        if (!array_key_exists($mainMenuPermission, $map)) {
            throw new InvalidArgumentException("Invalid Main menu permission value: {$mainMenuPermission}");
        }

        return $map[$mainMenuPermission];
    }
}
