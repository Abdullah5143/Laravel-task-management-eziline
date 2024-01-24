<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::firstOrCreate([
            'name' => 'Admin User',
            'email' => 'admin@eziline.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assignRole('admin');

        $managerUser = User::firstOrCreate([
            'name' => 'Manager User',
            'email' => 'manager@eziline.com',
            'password' => bcrypt('password'),
        ]);
        $managerUser->assignRole('manager');

        $userUser = User::firstOrCreate([
            'name' => 'Regular User',
            'email' => 'user@eziline.com',
            'password' => bcrypt('password'),
        ]);
        $userUser->assignRole('user');
    }
}
