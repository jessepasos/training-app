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
            'displacement' => 10034,
            'length' => 160,
            'draft' => 200,
            'num_cannons' => 20,
        ]);

        DB::table('ships')->insert([
            'name' => 'wowp',
            'displacement' => 1034,
            'length' => 1640,
            'draft' => 30,
            'num_cannons' => 200,
        ]);

        DB::table('ships')->insert([
            'name' => 'tiger ship',
            'displacement' => 10034,
            'length' => 160,
            'draft' => 200,
            'num_cannons' => 20,
        ]);

        DB::table('ships')->insert([
            'name' => 'super ship',
            'displacement' => 10034,
            'length' => 160,
            'draft' => 200,
            'num_cannons' => 20,
        ]);

        factory(App\Ship::class, 50)->create()->each(function($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
//            $u->pirates()->save(factory(App\Pirate::class)->make());
        });
    }
}
