<?php

use App\Contract\Entity\Currency\Field\NameInterface;
use App\Entity\Currency\Currency;
use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entitiesAttributes = [
            [
                NameInterface::CODE => 'BYN',
                NameInterface::NAME => 'Беларусский рубль',
                NameInterface::SORT_ORDER => 1,
            ],
            [
                NameInterface::CODE => 'USD',
                NameInterface::NAME => 'Доллар США',
                NameInterface::SORT_ORDER => 2,
            ]
        ];

        foreach ($entitiesAttributes as $entityAttributes) {
            $entity = new Currency($entityAttributes);
            $entity->save();
        }
    }
}
