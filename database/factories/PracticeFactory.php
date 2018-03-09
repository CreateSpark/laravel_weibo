<?php

use Faker\Generator as Faker;

    $factory->define(App\Models\Practice::class, function (Faker $faker) {

        $date_time = $faker->date . ' ' . $faker->time;

        return [
            'name' => $faker->name,
            'age' => $faker->numberBetween(18,30),
            'other' => $faker->numerify('123'),
            'created_at' => $date_time,
            'updated_at' => $date_time,
        ];
    });

