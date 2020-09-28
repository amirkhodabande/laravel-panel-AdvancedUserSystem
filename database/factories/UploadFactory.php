<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Upload;

$factory->define(Upload::class, function (Faker $faker) {
    return [
        // Only for test, please if you want to use it first complete it ....
        'title' => $faker->name,
        'upload_type' => 'image',
        'url' => "public/uploads/aaa.png",
    ];
});
