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

        factory(App\Seaport::class, 50)->create()->each(function($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
//            $u->pirates()->save(factory(App\Pirate::class)->make());
        });

    }
}
