<?php

use Illuminate\Database\Seeder;

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
            'name'=> "Bob",
            'email' => 'bob@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        
        DB::table('users')->insert([
            'name'=> "Fred",
            'email' => 'Fred@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        
        DB::table('users')->insert([
            'name'=> "Jack",
            'email' => 'Jack@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
