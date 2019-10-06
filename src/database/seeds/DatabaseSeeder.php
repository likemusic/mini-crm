<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(WarehousesTableSeeder::class);
        $this->call(StockItemsTableSeeder::class);
        $this->call(CounteragentsTableSeeder::class);
    }
}
