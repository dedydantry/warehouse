<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Satuan::class, function (Faker $faker) {
    $name = $faker->text(5).str_random(2);
    return [
        'satuan_name' => $name,
        'slug' => Str::slug($name, '-')
    ];
});
