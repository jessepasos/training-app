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
        DB::table('users')->insert([
            'name' => 'Newbird',
            'email' => 'newbird@datanerds.com',
            'password' => bcrypt('DataNerds23')
        ]);
    }
}
