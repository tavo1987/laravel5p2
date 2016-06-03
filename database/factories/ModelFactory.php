<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Post;
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name'     => $faker->name,
        'last_name'      => $faker->name,
        'email'          => $faker->safeEmail,
        'role'           => 'user',
        'password'       => bcrypt(str_random(10)),
        'api_token'      => str_random(60),
        'last_logged_at' => Carbon::now(),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Post::class, function (Faker\Generator $faker) {

    $title = $faker->sentence();

    return [
        'title'   => $title,
        'slug'    => str_slug($title),
        'content' => $faker->paragraph,
    ];

});
