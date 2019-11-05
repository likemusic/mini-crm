<?php

namespace App\Contract\Entity\User;

use App\Entity\User\TableSeeder\Admin as AdminUserSeeder;
use App\Entity\User\TableSeeder\Director as DirectorUserSeeder;
use App\Entity\User\TableSeeder\Courier as CourierUserSeeder;
use App\Entity\User\TableSeeder\Operator as OperatorUserSeeder;
use App\Entity\User\TableSeeder\Warehouseman as WarehousemanUserSeeder;

interface TableSeederClassNameInterface
{
//    const SUPER_ADMIN = AdminUserSeeder::class;
    const ADMIN = AdminUserSeeder::class;
    const DIRECTOR = DirectorUserSeeder::class;
    const COURIER = CourierUserSeeder::class;
    const OPERATOR = OperatorUserSeeder::class;
    const WAREHOUSEMAN = WarehousemanUserSeeder::class;
}
