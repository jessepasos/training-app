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
            'name' => 'Port Royal'
        ]);

        DB::table('ports')->insert([
            'name' => "St. Mary's Island"
        ]);

        DB::table('ports')->insert([
            'name' => 'Tortuga'
        ]);

        DB::table('ports')->insert([
            'name' => 'Clew Bay'
        ]);

        DB::table('ports')->insert([
            'name' => 'New Providence'
        ]);

        DB::table('ports')->insert([
            'name' => 'Barataria Bay'
        ]);

        DB::table('ports')->insert([
            'name' => 'Mirelark Bay'
        ]);

        DB::table('ports')->insert([
            'name' => 'Crusty Sailor Island'
        ]);

        DB::table('ports')->insert([
            'name' => 'Termina'
        ]);

        DB::table('ports')->insert([
            'name' => 'Port Mudcrabby Crab'
        ]);
    }
}
