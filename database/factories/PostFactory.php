<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\XModels\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'id' => md5($faker->word),
        'slug'=> $faker->slug,
        'title' => $faker->sentence,
        'summary' => $faker->sentence,
        'body' => $faker->paragraph,
        'featured_image' => $faker->imageUrl,
        'featured_image_caption' => 'Photo by'.$faker->imageUrl,
        'user_id' => 1,
        'meta' => $faker->sentence,
        'complete' => 1
    ];
});
