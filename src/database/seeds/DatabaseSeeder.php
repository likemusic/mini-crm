<?php

use App\Entity\Counteragent\TableSeeder as CounteragentsTableSeeder;
use App\Entity\Currency\TableSeeder as CurrenciesTableSeeder;
use App\Entity\ExchangeRate\TableSeeder as ExchangeRateTableSeeder;
use App\Entity\Product\TableSeeder as ProductsTableSeeder;
use App\Entity\ProductCategory\TableSeeder as ProductCategoriesTableSeeder;
use App\Entity\Role\TableSeeder as RolesTableSeeder;
use App\Entity\StockItem\TableSeeder as StockItemsTableSeeder;
use App\Entity\User\TableSeeder as UsersTableSeeder;
use App\Entity\Warehouse\TableSeeder as WarehousesTableSeeder;
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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CurrenciesTableSeeder::class);
        $this->call(ExchangeRateTableSeeder::class);
        $this->call(WarehousesTableSeeder::class);
        $this->call(StockItemsTableSeeder::class);
        $this->call(CounteragentsTableSeeder::class);
    }
}
