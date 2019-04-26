<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('manufacturers')->insert([
            'name'=> 'Saxon',
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
        DB::table('manufacturers')->insert([
            'name'=> 'Celestron',
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
        DB::table('manufacturers')->insert([
            'name'=> 'SkyWatcher',
            'updated_at'=> \DB::raw('CURRENT_TIMESTAMP'),
            ]);
    }
}
