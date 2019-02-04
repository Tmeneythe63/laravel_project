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
    }
}
