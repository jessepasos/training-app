<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('asdasd'),
        ]);

        factory(App\Admin::class, 50)->create()->each(function($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
        });
    }
}
