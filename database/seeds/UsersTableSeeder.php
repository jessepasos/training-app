<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => 'Newbird',
//            'email' => 'newbird@datanerds.com',
//            'password' => bcrypt('DataNerds23')
//        ]);
//        DB::table('users')->insert([
//            'name' => 'vincent',
//            'email' => 'vincent@gmail.com',
//            'password' => bcrypt('asdasd')
//        ]);
        factory(App\User::class, 5)->create()->each(function ($u) {
            for ($x = 0; $x < 2; $x++) {
                $u->seaports()->save(factory(App\Seaport::class)->make());
            }
            for ($x = 0; $x < 5; $x++) {
                $u->ships()->save(factory(App\Ship::class)->make());
                $u->pirates()->save(factory(App\Pirate::class)->make());
            }
        });
    }
}
