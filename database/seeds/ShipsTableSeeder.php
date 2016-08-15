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
