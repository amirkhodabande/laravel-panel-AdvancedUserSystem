<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Setting;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'company' => $faker->name,
        'logo' => $faker->title,
        'tell' => $faker->phoneNumber,
    ];
});
