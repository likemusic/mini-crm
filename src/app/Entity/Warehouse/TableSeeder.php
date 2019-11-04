<?php

namespace App\Entity\Warehouse;

use App\Entity\Warehouse\Warehouse;
use Illuminate\Database\Seeder;
use App\Entity\Product\Product;
use App\Contract\Entity\Warehouse\Field\NameInterface;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warehousesData = [
            [
                NameInterface::NAME => 'Склад 1',
                NameInterface::CODE => 'скл 1',
                NameInterface::SORT_ORDER => 1,
                NameInterface::NOTE => '',
            ],
            [
                NameInterface::NAME => 'Склад 2',
                NameInterface::CODE => 'скл 2',
                NameInterface::SORT_ORDER => 2,
                NameInterface::NOTE => '',
            ],
            [
                NameInterface::NAME => 'База',
                NameInterface::CODE => 'база',
                NameInterface::SORT_ORDER => 3,
                NameInterface::NOTE => '',
            ]
        ];

        foreach ($warehousesData as $warehouseData) {
            $warehouse = new Warehouse($warehouseData);
            $warehouse->save();
        }
    }
}