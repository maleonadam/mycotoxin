<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->delete();

        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'staff'
        ]);

        Role::create([
            'name' => 'user'
        ]);
    }
}
