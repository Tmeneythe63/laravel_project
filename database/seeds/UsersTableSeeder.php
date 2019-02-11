<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'admin',
            'email' =>'admin@gmail.com',
            'password' => bcrypt('admin'),
            'admin'  => true
        ]);
        DB::table('produits')->insert([
            'produitName' =>'test',
            'formuleChimique' =>'test',
            'unite' => 'test',
            'dateExp'  => '2019-2-2',
            'user_id'=>1,
            'category_id'=>1
        ]);
        DB::table('labos')->insert([
            'laboName' =>'labo1',
            'user_id' =>2
        ]);
        DB::table('magasins')->insert([
            'magasinName' =>'magasin1',
            'labo_id' =>1
        ]);
        DB::table('categories')->insert([
            'categoryName' =>'category1'
        ]);
    }
}
