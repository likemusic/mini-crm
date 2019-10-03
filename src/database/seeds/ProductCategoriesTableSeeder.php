<?php

use Illuminate\Database\Seeder;
use App\Model\ProductCategory;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductCategory::class, 3)->create();
//            ->each(function (ProductCategory $productCategory) {
//                $productCategory->posts()->save(factory(App\Post::class)->make());
//            });
    }
}
