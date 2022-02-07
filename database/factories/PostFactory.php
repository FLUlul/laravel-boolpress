<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker -> sentence(3, true),
        'author' => $faker -> name(),
        'subtitle' => $faker -> words(3, true),
        'content' => $faker -> text(200),
        'likes' => $faker -> randomNumber(5, false),
    ];
});
