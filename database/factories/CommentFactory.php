<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

    $factory->define(Comment::class, function (Faker $faker) {
    $created=$faker->dateTimeBetween('-30 days','-1 day'); // пост создается рандомно в любой день из последних 30 с шагом в 1 день
    $text=$faker->realText(rand(50,100));
    return [
        'text'=>$text,
        'user_id'=>rand(1,6), //выбирается рандомный автор из созданных начиная с первого
        'post_id'=>rand(1,16), //выбирается рандомный пост из созданных начиная с первого
        'created_at'=>$created,
        'updated_at'=>$created,
    ];
});
