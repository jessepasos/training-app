<?php

use Illuminate\Database\Seeder;

class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranks')->insert([
            'name' => 'Captain'
        ]);
        DB::table('ranks')->insert([
            'name' => 'First Mate'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Second Mate'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Seargant at Arms'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Seaman'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Cook'
        ]);
        DB::table('ranks')->insert([
            'name' => 'Unassigned'
        ]);
    }
}
