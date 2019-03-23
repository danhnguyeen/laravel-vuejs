<?php

use Faker\Generator as Faker;

$factory->define(CMSTutorial\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->paragraph,
        'user_id' => function () {
            return factory(CMSTutorial\User::class)->create()->id;
        }
    ];
});
