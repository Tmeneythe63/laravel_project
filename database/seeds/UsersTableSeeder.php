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
        DB::table('profiles')->insert([           
            'user_id' =>1,
            
        ]);
        //2
        DB::table('users')->insert([
            'name' =>'user1',
            'email' =>'user1@gmail.com',
            'password' => bcrypt('123456')
        ]);
        DB::table('profiles')->insert([           
            'user_id' =>2,
            
        ]);
        //3
        DB::table('users')->insert([
            'name' =>'user2',
            'email' =>'user2@gmail.com',
            'password' => bcrypt('123456')
        ]);
        DB::table('profiles')->insert([           
            'user_id' =>3,
            
        ]);
        //4
        DB::table('users')->insert([
            'name' =>'user3',
            'email' =>'user3@gmail.com',
            'password' => bcrypt('123456')
        ]);
        DB::table('profiles')->insert([           
            'user_id' =>4,
            
        ]);

        //5
        DB::table('users')->insert([
            'name' =>'user4',
            'email' =>'user4@gmail.com',
            'password' => bcrypt('123456')
        ]);
        DB::table('profiles')->insert([           
            'user_id' =>5,
            
        ]);
        //6
        DB::table('users')->insert([
            'name' =>'user5',
            'email' =>'user5@gmail.com',
            'password' => bcrypt('123456')
        ]);
        DB::table('profiles')->insert([           
            'user_id' =>6,
            
        ]);
        //7
        DB::table('users')->insert([
            'name' =>'user6',
            'email' =>'user6@gmail.com',
            'password' => bcrypt('123456')
        ]);
        DB::table('profiles')->insert([           
            'user_id' =>7,
            
        ]);




        DB::table('produits')->insert([
            'produitName' =>'test',
            'formuleChimique' =>'test',
            'unite' => 'test',
            'dateExp'  => '2019-2-2',
            'user_id'=>1,
            'category_id'=>1
        ]);
       
    }
}
