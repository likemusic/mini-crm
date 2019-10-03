<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contract\Entity\ProductCategory\Field\NameInterface as EntityFieldNameInterface;
use App\Model\ProductCategory;
use Faker\Generator as Faker;


$productCategories = [
    'Apple',
    'ASUS',
    'Blackberry',
    'Blackview',
    'Caterpillar',
    'Digma',
    'Doogee',
    'Ginzzu',
    'Google',
];


$factory->define(ProductCategory::class, function (Faker $faker) use ($productCategories) {
    return [
        EntityFieldNameInterface::NAME => $faker->unique()->randomElement($productCategories),
    ];
});
