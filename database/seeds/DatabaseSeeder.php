<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //php artisan db:seed
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        //factory(App\User::class,10)->create();
       // factory(App\Profile::class,10)->create();
        factory(App\Labo::class,10)->create();
        factory(App\Magasin::class,10)->create();
        factory(App\Category::class,10)->create();
        factory(App\Produit::class,50)->create();
        factory(App\Offre::class,200)->create();
        
    }
}
