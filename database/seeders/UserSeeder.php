<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'beni',
            'email' => 'beni@gmail.com',
            'password' => bcrypt('beni@gmail.com'),
            'profile_picture' => 'pp.png',
            'about' => 'ini about lohh',
            'description' => 'ini description lohh'
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@gmail.com'),
            'profile_picture' => 'pp.png',
            'about' => 'ini about lohh',
            'description' => 'ini description lohh'
        ]);
        User::create([
            'name' => 'testing',
            'email' => 'testing@gmail.com',
            'password' => bcrypt('testing@gmail.com'),
            'profile_picture' => 'pp.png',
            'about' => 'ini about lohh',
            'description' => 'ini description lohh'
        ]);
    }
}
