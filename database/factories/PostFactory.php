<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Post::class, function (Faker $faker) {
	$count = User::count();
        return [
        'titulo'  => $faker->name,
        'post'    => $faker->text($maxNbChars = 50),
        'user_id' => $faker->numberBetween(1, $count),
    ];
});
