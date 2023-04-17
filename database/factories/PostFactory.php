<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title=$faker->realText(rand(10,40));
    $short_title=\Illuminate\Support\Str::length($title)>30 ? mb_substr($title,0,30) . '...': $title; // берем первые 30 символов и ставим три точки в конце, если title короткий, то берем title без трех точек....mb_strlen = \Illuminate\Support\Str::length
    $created=$faker->dateTimeBetween('-30 days','-1 day'); // пост создается рандомно в любой день из последних 30 с шагом в 1 день

    //прописываем логику:
    return [
        'title'=>$title,
        'text'=>$faker->realText(rand(100,500)),
        'short_title'=>$short_title,
        'user_id'=>rand(1,6), //выбирается рандомный автор из созданных начиная с первого
        //'comment_id'=>rand(1,16),
        'created_at'=>$created,
        'updated_at'=>$created,
    ];
});
