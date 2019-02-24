<?php

use App\Labo;
use App\User;
use App\Category;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Magasin::class, function (Faker $faker) {
    return [
        'magasinName' => $faker->unique()->name,
        'labo_id'=> function(){
            return Labo::all()->random();
        }  ,
  ];
});
