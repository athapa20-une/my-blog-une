<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the roles table before seeding
        Role::truncate();

        // Create roles
        Role::create([
            'name' => 'Admin',
            'description' => 'Administrator role with full access.',
        ]);

        Role::create([
            'name' => 'Author',
            'description' => 'Author role with permission to create and manage content.',
        ]);

        Role::create([
            'name' => 'User',
            'description' => 'Regular user role with limited access.',
        ]);
    }
}
