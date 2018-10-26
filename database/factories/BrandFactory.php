<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Brand::class, function (Faker $faker) {
    $name = $faker->text(8).str_random(2);
    return [
        'brand_name' => $name,
        'slug' => Str::slug($name, '-')
    ];
});
