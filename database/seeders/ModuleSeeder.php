<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Truncate the modules table before seeding
         Module::truncate();

         // Create modules
         Module::create([
             'name' => 'Posts',
             'description' => 'Module for managing posts.',
         ]);
 
         Module::create([
             'name' => 'Users',
             'description' => 'Module for managing users.',
         ]);
    }
}
