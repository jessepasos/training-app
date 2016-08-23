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
//        DB::table('pirates')->insert([
//            'name' => 'Blackbird',
//            'rank' => 'Captain',
//            'ship_id' => 1,
//        ]);
//
//        DB::table('pirates')->insert([
//            'name' => 'Jaybird',
//        ]);
//
//        DB::table('pirates')->insert([
//            'name' => 'Bigbird',
//        ]);
//
//        DB::table('pirates')->insert([
//            'name' => 'Phoenix',
//        ]);
//
//        DB::table('pirates')->insert([
//            'name' => 'The Raven',
//        ]);
//
//        DB::table('pirates')->insert([
//            'name' => 'Thunderbird',
//        ]);
//
//        DB::table('pirates')->insert([
//            'name' => 'Jade Falcon',
//        ]);

        factory(App\Pirate::class, 50)->create()->each(function($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
        });
    }
}
