<?php

namespace App\Entity\Product;

use Illuminate\Database\Seeder;
use App\Entity\Product\Product;
use App\Contract\Entity\SeedCountInterface;

class TableSeeder extends Seeder
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
