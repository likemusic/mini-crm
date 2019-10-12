<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Contract\Entity\Order\TableInterface;
use App\Contract\Entity\Order\Field\NameInterface;

class OrderRepository
{
    public function getNextDateOrderId()
    {
        $maxNextDateOrderId = $this->getMaxDateOrderId();

        return ++$maxNextDateOrderId;
    }

    private function getMaxDateOrderId()
    {
        return DB::table(TableInterface::NAME)
            ->whereDate(
                NameInterface::DATETIME,
                '=',
                date('Y-m-d')
            )->max(NameInterface::DATE_ORDER_ID);
    }
}
