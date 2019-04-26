<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('likes')->insert([
            'user_id'=> 'bob@gmail.com',
            'status'=> 'like',
            'comment_id' => 1,
            ]);
        DB::table('likes')->insert([
            'user_id'=> 'bob@gmail.com',
            'status'=> 'dislike',
            'comment_id' => 2,
            ]);
    }
}
