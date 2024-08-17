<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the permissions table before seeding
        Permission::truncate();

        // Create permissions
        Permission::create([
            'name' => 'Add',
            'description' => 'Permission to add new records.',
        ]);

        Permission::create([
            'name' => 'Edit',
            'description' => 'Permission to edit existing records.',
        ]);

        Permission::create([
            'name' => 'Delete',
            'description' => 'Permission to delete records.',
        ]);

        Permission::create([
            'name' => 'Show',
            'description' => 'Permission to view records.',
        ]);
    }
}
