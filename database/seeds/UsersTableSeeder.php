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
        factory(App\User::class, 50)->create()->each(function ($u) {
            $u->seaports()->save(factory(App\Seaport::class)->make());
        });
    }
}
