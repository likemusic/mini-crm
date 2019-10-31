<?php

use Illuminate\Database\Seeder;
use App\Entity\ProductCategory\ProductCategory;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductCategory::class, SeedCountInterface::PRODUCT_CATEGORY)->create();
//            ->each(function (ProductCategory $productCategory) {
//                $productCategory->posts()->save(factory(App\Post::class)->make());
//            });
    }
}
