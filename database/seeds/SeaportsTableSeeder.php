<?php

use Illuminate\Database\Seeder;

class SeaportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('seaports')->insert([
            'name' => 'Jamaica Bay',
        ]);

        DB::table('seaports')->insert([
            'name' => 'Cool Bay',
        ]);

        DB::table('seaports')->insert([
            'name' => 'Dragon Bay',
        ]);

    }
}
