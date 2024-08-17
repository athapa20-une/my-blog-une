<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        // Truncate the users table before seeding
        DB::table('role_user')->truncate(); // Truncate the pivot table
        DB::table('role_permission')->truncate(); // Truncate the pivot table
         // Create 3 dummy users
         $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),
        ]);

        $user2 = User::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'password' => Hash::make('password123'),
        ]);

        $user3 = User::create([
            'name' => 'Alice Johnson',
            'email' => 'alice.johnson@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Assign roles to users
        $adminRole = Role::where('name', 'Admin')->first();
        $authorRole = Role::where('name', 'Author')->first();
        $userRole = Role::where('name', 'User')->first();

        DB::table('role_user')->insert([
            ['role_id' => $adminRole->id, 'user_id' => $user1->id],
            ['role_id' => $authorRole->id, 'user_id' => $user2->id],
            ['role_id' => $userRole->id, 'user_id' => $user3->id],
        ]);


        // Assign permissions to roles with specific modules for Admin
        $permissions = Permission::all(); // Get all permissions
        $modules = Module::all(); // Get all modules

        // Assign all permissions of all modules to the Admin role
        foreach ($modules as $module) {
            foreach ($permissions as $permission) {
                DB::table('role_permission')->insert([
                    'role_id' => $adminRole->id,
                    'module_id' => $module->id,
                    'permission_id' => $permission->id,
                ]);
            }
        }

        // Assign specific permissions of Posts module to Author role
        $postsModule = Module::where('name', 'Posts')->first();
 
        foreach ($permissions as $permission) {
            DB::table('role_permission')->insert([
                'role_id' => $authorRole->id,
                'module_id' => $postsModule->id,
                'permission_id' => $permission->id,
            ]);
        }

        // Assign only Show permission of Posts module to User role
        $showPermission = Permission::where('name', 'Show')->first();

        DB::table('role_permission')->insert([
            'role_id' => $userRole->id,
            'module_id' => $postsModule->id,
            'permission_id' => $showPermission->id,
        ]);

    }
}
