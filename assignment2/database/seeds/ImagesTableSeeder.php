<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('images')->insert([
            'image'=> 'images/image.jpg',
            'name'=> 'bob@gmail.com',
            'product_id'=> 1,
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
             DB::table('images')->insert([
            'image'=> 'images/image.jpg',
            'name'=> 'bob@gmail.com',
            'product_id'=> 1,
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
             DB::table('images')->insert([
            'image'=> 'images/image.jpg',
            'name'=> 'bob@gmail.com',
            'product_id'=> 2,
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
             DB::table('images')->insert([
            'image'=> 'images/image.jpg',
            'name'=> 'bob@gmail.com',
            'product_id'=> 2,
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
    }
}
