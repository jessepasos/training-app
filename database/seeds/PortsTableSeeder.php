<?php

use Illuminate\Database\Seeder;

class PortsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ports')->insert([
            'name'            => 'Port Royal',
            'treasure_amount' => 100,
        ]);

        DB::table('ports')->insert([
            'name'            => "St. Mary's Island",
            'treasure_amount' => 100,
        ]);

        DB::table('ports')->insert([
            'name'            => 'Tortuga',
            'treasure_amount' => 100,
        ]);

        DB::table('ports')->insert([
            'name'            => 'Clew Bay',
            'treasure_amount' => 100,
        ]);

        DB::table('ports')->insert([
            'name'            => 'New Providence',
            'treasure_amount' => 100,
        ]);

        DB::table('ports')->insert([
            'name'            => 'Barataria Bay',
            'treasure_amount' => 100,
        ]);

        DB::table('ports')->insert([
            'name'            => 'Mirelark Bay',
            'treasure_amount' => 100,
        ]);

        DB::table('ports')->insert([
            'name'            => 'Crusty Sailor Island',
            'treasure_amount' => 100,
        ]);

        DB::table('ports')->insert([
            'name'            => 'Termina',
            'treasure_amount' => 100,
        ]);

        DB::table('ports')->insert([
            'name'            => 'Port Mudcrabby Crab',
            'treasure_amount' => 100,
        ]);
    }
}
