<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'iduser'    => rand(1,4),
        'title'     =>$faker->sentence,
        'slug'      =>$faker->sentence,
        'body'      =>$faker->text(800),
    ];
});
