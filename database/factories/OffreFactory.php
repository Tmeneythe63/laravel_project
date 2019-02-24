<?php

use App\User;
use App\Produit;
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

$factory->define(App\Offre::class, function (Faker $faker) {
    return [
        'quantite' => $faker->randomDigit,
        'user_id'=> function(){
            return User::all()->random();
        }  ,  
        'typeOffre'=>'Changement',
        'typeEnonce'=>'Offre',
        'description'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'image'=>'uploads/offres/default.PNG',
        'produit_id'=> function(){
            return Produit::all()->random();
        }  ,
        
    ];
});
