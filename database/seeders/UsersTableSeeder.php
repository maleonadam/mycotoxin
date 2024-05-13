<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::whereName('admin')->first();

        $staffRole = Role::whereName('staff')->first();

        $userRole = Role::whereName('user')->first();

        $user = User::create([
            'name' => 'Adam',
            'lastname' => 'Maleon',
            'email' => 'adam@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $user->assignRole($adminRole);
        $user->assignRole($staffRole);
        $user->assignRole($userRole);

        $user = User::create([
            'name' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $user->assignRole($staffRole);

        $user = User::create([
            'name' => 'Jane',
            'lastname' => 'Daen',
            'email' => 'jane@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        $user->assignRole($userRole);
    }
}
