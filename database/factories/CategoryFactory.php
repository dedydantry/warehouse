<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Category::class, function (Faker $faker) {
    $name = $faker->text(13).str_random(2);
    return [
        'category_name' => $name,
        'slug' => Str::slug($name, '-')
    ];
});
