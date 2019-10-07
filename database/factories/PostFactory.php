<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName,
        'image' => UploadedFile::fake()->image('avatar.jpg'),
        'content' => Str::random(40),
        'tags' => Str::random(8),
        'status' => 'Draft',
    ];
});
