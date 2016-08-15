<?php

use Illuminate\Database\Seeder;

class ShipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ships')->insert([
            'name' => 'Dragon Ship',
            'displacement' => 10034,
            'length' => 160,
            'draft' => 200,
            'num_cannons' => 20,
        ]);

//        DB::table('seaports')->insert([
//            'name' => 'Cool Bay',
//        ]);
//
//        DB::table('seaports')->insert([
//            'name' => 'Dragon Bay',
//        ]);
    }
}
