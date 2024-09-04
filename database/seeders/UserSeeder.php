<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('Administrator');

        $agent = User::create([
            'username' => 'Agent',
            'email' => 'Agent@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $agent->assignRole('Agent');

        $engineer = User::create([
            'username' => 'Engineer',
            'email' => 'engineer@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $engineer->assignRole('Engineer');
    }
}
