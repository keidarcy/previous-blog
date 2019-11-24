<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\XModels\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'id' => md5($faker->word),
        'slug'=> $faker->word,
        'name' => $faker->word,
    ];
});
