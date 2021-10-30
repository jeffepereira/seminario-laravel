<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'content' => $faker->sentence(10, true),
        'image' => $faker->imageUrl()
    ];
});
