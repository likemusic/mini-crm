<?php


namespace App\Entity\Pharmacy;


class PharmacyHelper
{
    const COLUMN_PREFIX_WAREHOUSE = 'warehouse';

    public function getWarehouseColumnName(int $warehouseId)
    {
        return self::COLUMN_PREFIX_WAREHOUSE . $warehouseId;
    }
}
