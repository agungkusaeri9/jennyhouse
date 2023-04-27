<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin1 = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'status' => 1,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $user = User::create([
            'name' => 'User',
            'username' => 'user',
            'status' => 1,
            'email' => 'user@gmail.com',
            'password' => bcrypt('user')
        ]);
        $admin1->assignRole('Admin');
        $user->assignRole('User');
    }
}
