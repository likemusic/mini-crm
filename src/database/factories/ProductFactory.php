<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contract\Entity\Product\Field\NameInterface as EntityFieldNameInterface;
use App\Model\ProductCategory;
use App\Model\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) use ($productCategories) {
    $productCategories = getProductCategories();
    $category = $faker->randomElement($productCategories);
    $approximatePrice = $faker->randomDigit;
    $name = 'Телефон ' . autoIncrement()->current();

    return [
        EntityFieldNameInterface::NAME => $name,
        EntityFieldNameInterface::CATEGORY_ID => $category->id,
        EntityFieldNameInterface::APPROXIMATE_PRICE => $approximatePrice,
        EntityFieldNameInterface::SELLING_PRICE => $approximatePrice * 1.15,
    ];
});

function getProductCategories()
{
    static $productCategories = null;

    if ($productCategories === null) {
        $productCategories = ProductCategory::all();
    }

    return $productCategories;
}

function autoIncrement()
{
    static $i = 1;

    do {
        yield $i++;
    } while(true);
}
