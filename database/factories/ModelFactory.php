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

use Modules\User\Entities\User;
use Modules\Gallery\Entities\Album;
use Modules\Gallery\Entities\AlbumContent;
use Modules\Gallery\Entities\Image;
use Modules\Gallery\Entities\ImageContent;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Album::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->slug(3),
        'active' => true,
        'user_id' => User::first()->id,
    ];
});

$factory->define(AlbumContent::class, function (Faker\Generator $faker) {
    return [
        'locale' => 'en',
        'title' => $faker->sentence(3),
        'text' => $faker->text,
        'keywords' => $faker->words(4, true),
        'description' => $faker->sentence(6),
    ];
});

$factory->define(Image::class, function (Faker\Generator $faker) {
    return [
        'slug' => $faker->slug(3),
        'active' => true,
        'user_id' => User::first()->id,
    ];
});

$factory->define(ImageContent::class, function (Faker\Generator $faker) {
    return [
        'locale' => 'en',
        'title' => $faker->sentence(3),
        'text' => $faker->text,
        'keywords' => $faker->words(4, true),
        'description' => $faker->sentence(6),
    ];
});