<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Contract\Entity\Warehouse\TableInterface;
use App\Contract\Entity\Warehouse\Field\NameInterface;
use App\Model\Warehouse;

class WarehouseRepository
{
    public function getAll($columns = ['*'])
    {
        return Warehouse::all($columns);
    }

    public function getSortedCodes(): Collection
    {
        return DB::table(TableInterface::NAME)
            ->orderBy(NameInterface::SORT_ORDER)
            ->pluck(NameInterface::CODE, NameInterface::ID);
    }

    public function getSortedIds(): Collection
    {
        return DB::table(TableInterface::NAME)
            ->orderBy(NameInterface::SORT_ORDER)
            ->pluck(NameInterface::ID);
    }
}
