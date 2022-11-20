<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'a@a.com',
            'type' => 'Admin',
            'password' => bcrypt('ishopboxadmin'),
            'p2' => 'ishopboxadmin'
        ]);
    }
}
