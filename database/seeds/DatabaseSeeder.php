<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		$this->call(AttackPortsTableSeeder::class);
            $this->call(RanksTableSeeder::class);
            $this->call(PortsTableSeeder::class);
            $this->call(ShipLevelsSeeder::class);
            //$this->call(PiratesTableSeeder::class);
            // $this->call(ShipsTableSeeder::class); 

    }
}
