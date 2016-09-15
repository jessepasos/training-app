<?php

use Illuminate\Database\Seeder;

class AttackPortsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('attackPorts')->insert([
            'name' => 'Port Boil',
            'treasure_amount' => 1000
        ]);
        DB::table('attackPorts')->insert([
            'name' => 'Port USB',
            'treasure_amount' => 1000
        ]);
        DB::table('attackPorts')->insert([
            'name' => 'Data Birds Bay',
            'treasure_amount' => 1000
        ]);
        DB::table('attackPorts')->insert([
            'name' => 'Treasure Cove',
            'treasure_amount' => 1000
        ]);
        DB::table('attackPorts')->insert([
            'name' => 'Potato Island',
            'treasure_amount' => 1000
        ]);
        DB::table('attackPorts')->insert([
            'name' => 'Port Unoriginal',
            'treasure_amount' => 1000
        ]);
        DB::table('attackPorts')->insert([
            'name' => 'The Bay',
            'treasure_amount' => 1000
        ]);
        DB::table('attackPorts')->insert([
            'name' => 'Port Port',
            'treasure_amount' => 1000
        ]);
        DB::table('attackPorts')->insert([
            'name' => 'Cove of Garlic',
            'treasure_amount' => 1000
        ]);
        DB::table('attackPorts')->insert([
            'name' => 'Lost Creativity',
            'treasure_amount' => 1000
        ]);

    }
}
