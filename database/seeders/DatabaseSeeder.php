<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            // Add other seeders here
            RoleAndPermissionSeeder::class,
        ]);

        $superAdmin =  User::factory()->create([
            'name' => 'Super Admin',
            'password' => bcrypt('superadmin'),
            'email' => 'superadmin@gmail.com',
        ]);

        $admin =  User::factory()->create([
            'name' => 'Admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@gmail.com',
        ]);

        $superAdmin->assignRole('Super Admin');
        $admin->assignRole('Admin');
        // $user->assignRole('Customer');
        // $user->assignRole('Finance');
    }
}
