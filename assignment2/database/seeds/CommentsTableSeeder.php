<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('comments')->insert([
            'product_id'=> 1,
            'name'=> 'Bob',
            'email'=> 'bob@gmail.com',
            'comment' => 'Hello',
            'rating' => 3,
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
        DB::table('comments')->insert([
            'product_id'=> 1,
            'name'=> 'Bobson',
            'email'=> 'bobson@gmail.com',
            'comment' => 'Hello',
            'rating' => 4,
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
         DB::table('comments')->insert([
            'product_id'=> 3,
            'name'=> 'Bob',
            'email'=> 'bob@gmail.com',
            'comment' => 'Hello',
            'rating' => 3,
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
        DB::table('comments')->insert([
            'product_id'=> 3,
            'name'=> 'Bobson',
            'email'=> 'bobson@gmail.com',
            'comment' => 'Hello',
            'rating' => 1,
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
    }
}
