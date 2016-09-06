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
         $this->call(PortsTableSeeder::class);
//         $this->call(PiratesTableSeeder::class);
//         $this->call(ShipsTableSeeder::class);
    }
}
