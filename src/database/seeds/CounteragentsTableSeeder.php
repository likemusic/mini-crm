<?php

use App\Entity\Warehouse\Warehouse;
use Illuminate\Database\Seeder;
use App\Entity\Counteragent\Counteragent;
use App\Contract\Entity\Counteragent\Field\NameInterface;

class CounteragentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                NameInterface::NAME => 'сибас',
            ],
            [
                NameInterface::NAME => 'гришка',
            ],
            [
                NameInterface::NAME => 'брюз',
            ],
            [
                NameInterface::NAME => 'jv',
            ],
            [
                NameInterface::NAME => 'тимон',
            ],
            [
                NameInterface::NAME => 'макдональд',
            ],
            [
                NameInterface::NAME => 'лес',
            ],
            [
                NameInterface::NAME => 'хохол',
            ],
            [
                NameInterface::NAME => 'Вадим рст',
            ],
            [
                NameInterface::NAME => 'dj',
            ],
        ];

        foreach ($data as $entity) {
            $entity = new Counteragent($entity);
            $entity->save();
        }
    }
}
