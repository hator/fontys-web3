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
            'id' => 1,
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('qweasdzxc'),
            'admin' => true,
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Test user',
            'email' => 'user@user.com',
            'password' => bcrypt('qweasdzxc'),
        ]);
    }
}
