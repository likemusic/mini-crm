<?php

return [
    'model_class_name' => \App\Entity\User\User::class, // \App\User::class
    'key' => 'email', // Аny field that is unique for user (e.g. `emial`or `id`)
    'values' => [
        'admin1@test.loc', // admin
//        'courier1@test.loc', // courier
//        'operator1@test.loc', // operator
//        'warehouseman1@test.loc', // warehouseman
    ], // `key` values for users in autologin panel
    'name_template' => '{name} ({email})', // Template string for naming users in panel (e.g. '{first_name} {last_name}').
    'id_field_name' => 'id', // id field for user (e.g. `id`or `user_id`)
    'route_middleware' => ['web'],
];
