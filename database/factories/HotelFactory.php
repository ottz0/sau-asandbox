<?php

use Faker\Generator as Faker;

$factory->define(App\Hotel::class, function (Faker $faker) {
    return [
        'hotel_name' => $faker->company,
        'hotel_desc' => $faker->paragraph,
        'hotel_phone' => $faker->PhoneNumber
    ];
});
