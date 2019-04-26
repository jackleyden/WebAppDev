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
            'Fullname'=> "Bob",
            'email' => 'bob@gmail.com',
            'password' => bcrypt('123456'),
            'DOB' => new DateTime('6 May 2014'),
            'type' => 'admin',
        ]);
        
        DB::table('users')->insert([
            'Fullname'=> "Bobson",
            'email' => 'bobson@gmail.com',
            'password' => bcrypt('123456'),
            'DOB' => new DateTime('6 May 2014'),
            'type' => 'user',
        ]);
    }
}
