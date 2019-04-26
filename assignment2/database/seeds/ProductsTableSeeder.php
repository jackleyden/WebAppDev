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
            'name'=> 'Celestron Luminos 2.5x 2" Barlow Lens',
            'price'=> '289.95',
            'manufacturer_id' => '2',
            'desc' => "Ensure your telescope is celestron before trying to use this zoom.",
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
        
        DB::table('products')->insert([
            'name'=> 'Saxon 2x 1.25" Barlow Lens with Camera Adapter',
            'price'=> '79.95',
            'manufacturer_id' => '1',
            'desc' => "Ensure your telescope is saxon before trying to use this zoom.",
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
        DB::table('products')->insert([
            'name'=> 'SkyWatcher 2x(D) 1.25" Single Barlow Lens',
            'price'=> '27',
            'manufacturer_id' => '3',
            'desc' => "Ensure your telescope is correct model before trying to use this zoom.",
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
        DB::table('products')->insert([
            'name'=> 'SkyWatcher 2x 1.25” Achromatic Barlow Lens w/ Camera Adapter',
            'price'=> '27',
            'manufacturer_id' => '3',
            'desc' => "Ensure your telescope is correct model before trying to use this zoom.",
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
        DB::table('products')->insert([
            'name'=> 'Saxon 1.25" 3x Achromatic Barlow Lens',
            'price'=> '65',
            'manufacturer_id' => '1',
            'desc' => "Ensure your telescope is correct model before trying to use this zoom.",
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
        DB::table('products')->insert([
            'name'=> 'Celestron 1.25" Universal Barlow Lens and T-Adapter',
            'price'=> '109.95',
            'manufacturer_id' => '2',
            'desc' => "Ensure your telescope is correct model before trying to use this zoom.",
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
    }
}
