<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'uazonner@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name' => 'demo',
            'email' => 'demo@gmail.com',
            'password' => bcrypt('demo123qwe'),
            'remember_token' => str_random(10),
        ]);
    }
}
