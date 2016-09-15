<?php

use Illuminate\Database\Seeder;

class PiratesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pirates')->insert([
            'user_id' => 1,
            'ship_id' => 1,
            'name' => 'Blackbird',
            'rank_id' => 1
        ]);

        DB::table('pirates')->insert([
            'user_id' => 1,
            'ship_id' => 1,
            'name' => 'Jaybird',
        ]);

        DB::table('pirates')->insert([
            'user_id' => 1,
            'ship_id' => 1,
            'name' => 'Bigbird',
        ]);

        DB::table('pirates')->insert([
            'user_id' => 1,
            'ship_id' => 1,
            'name' => 'Phoenix',
        ]);

        DB::table('pirates')->insert([
            'user_id' => 1,
            'ship_id' => 1,
            'name' => 'The Raven',
        ]);

        DB::table('pirates')->insert([
            'user_id' => 1,
            'ship_id' => 1,
            'name' => 'Thunderbird',
        ]);

        DB::table('pirates')->insert([
            'user_id' => 1,
            'ship_id' => 1,
            'name' => 'Jade Falcon',
        ]);
    }
}
