<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name'=> 'phone 6',
            'price'=> '600',
            'manufacturer_id' => '1',
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
         DB::table('products')->insert([
            'name'=> 'phone 5',
            'price'=> '500',
            'manufacturer_id' => '1',
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
         DB::table('products')->insert([
            'name'=> 'phone 4',
            'price'=> '400',
            'manufacturer_id' => '1',
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
        DB::table('manufacturers')->insert([
            'name'=> 'Apple',
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
        DB::table('manufacturers')->insert([
            'name'=> 'man2',
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
    }
}
