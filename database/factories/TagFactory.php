<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\XModels\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'id' => md5($faker->word),
        'slug'=> $faker->word,
        'name' => $faker->word,
    ];
});
