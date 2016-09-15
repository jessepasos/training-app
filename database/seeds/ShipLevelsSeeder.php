<?php

use Illuminate\Database\Seeder;

class ShipLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ship_levels')->insert([
            'name' => 'Row boat',
            'max_health' => 5,
            'max_crew' => 6,
            'max_cannons' => 1,
            'max_cargo' => 10,
            'max_speed' => 10,
            'cost' => 1000
        ]);

        DB::table('ship_levels')->insert([
            'name' => 'Sloop',
            'max_health' => 10,
            'max_crew' => 12,
            'max_cannons' => 3,
            'max_cargo' => 25,
            'max_speed' => 10,
            'cost' => 2000
        ]);

        DB::table('ship_levels')->insert([
            'name' => 'Sloop of War',
            'max_health' => 15,
            'max_crew' => 18,
            'max_cannons' => 6,
            'max_cargo' => 50,
            'max_speed' => 15,
            'cost' => 3000
        ]);

        DB::table('ship_levels')->insert([
            'name' => 'Brigantine',
            'max_health' => 25,
            'max_crew' => 24,
            'max_cannons' => 10,
            'max_cargo' => 100,
            'max_speed' => 20,
            'cost' => 4000
        ]);

        DB::table('ship_levels')->insert([
            'name' => 'Brig',
            'max_health' => 35,
            'max_crew' => 30,
            'max_cannons' => 15,
            'max_cargo' => 150,
            'max_speed' => 25,
            'cost' => 5000
        ]);

        DB::table('ship_levels')->insert([
            'name' => 'Large Brig',
            'max_health' => 50,
            'max_crew' => 40,
            'max_cannons' => 20,
            'max_cargo' => 250,
            'max_speed' => 30,
            'cost' => 10000
        ]);

        DB::table('ship_levels')->insert([
            'name' => 'Large Frigate',
            'max_health' => 75,
            'max_crew' => 50,
            'max_cannons' => 30,
            'max_cargo' => 300,
            'max_speed' => 35,
            'cost' => 15000
        ]);

        DB::table('ship_levels')->insert([
            'name' => 'War Galleon',
            'max_health' => 100,
            'max_crew' => 60,
            'max_cannons' => 50,
            'max_cargo' => 400,
            'max_speed' => 40,
            'cost' => 20000
        ]);

        DB::table('ship_levels')->insert([
            'name' => 'Treasure Galleon',
            'max_health' => 150,
            'max_crew' => 75,
            'max_cannons' => 75,
            'max_cargo' => 500,
            'max_speed' => 45,
            'cost' => 50000
        ]);

        DB::table('ship_levels')->insert([
            'name' => 'Flag Galleon',
            'max_health' => 200,
            'max_crew' => 100,
            'max_cannons' => 100,
            'max_cargo' => 1000,
            'max_speed' => 50,
            'cost' => 100000
        ]);
    }
}
