<?php

use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('followers')->insert([
            'follower'=> 'bobson@gmail.com',
            'following'=> 'bob@gmail.com',
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
        DB::table('followers')->insert([
            'follower'=> 'bob@gmail.com',
            'following'=> 'bobson@gmail.com',
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
    }
}
