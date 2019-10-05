<?php

use Illuminate\Database\Seeder;
use App\Model\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, SeedCountInterface::PRODUCTS)->create();
//            ->each(function (ProductCategory $productCategory) {
//                $productCategory->posts()->save(factory(App\Post::class)->make());
//            });
    }
}
