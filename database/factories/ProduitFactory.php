<?php

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

$factory->define(App\Produit::class, function (Faker $faker) {
    return [
        'produitName' => $faker->name,
        'user_id'=> function(){
            return User::all()->random();
        }  ,  
        'formuleChimique'=>$faker->word,
        'unite'=>$faker->word,
        'dateExp'=>$faker->date,
        'unite'=>$faker->word,
        'category_id'=> function(){
            return Category::all()->random();
        }  ,
        
    ];
});
