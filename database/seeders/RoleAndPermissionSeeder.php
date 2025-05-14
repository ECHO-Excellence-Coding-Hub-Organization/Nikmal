<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        // Create Permissions
        Permission::create(['name' => 'manage customers']);
        Permission::create(['name' => 'create customer']);
        Permission::create(['name' => 'edit customer']);
        Permission::create(['name' => 'delete customer']);

        Permission::create(['name' => 'manage vehicles']);
        Permission::create(['name' => 'create vehicle']);
        Permission::create(['name' => 'edit vehicle']);
        Permission::create(['name' => 'delete vehicle']);
        
        Permission::create(['name' => 'manage rentals']);
        Permission::create(['name' => 'manage documents']);
        Permission::create(['name' => 'view reports']);
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'manage settings']);
        Permission::create(['name' => 'view vehicles']);
        Permission::create(['name' => 'create rental']);
        Permission::create(['name' => 'view rental history']);
        Permission::create(['name' => 'update profile']);
        Permission::create(['name' => 'upload documents']);
        Permission::create(['name' => 'manage payments']);
        Permission::create(['name' => 'update rental status']);


        // Create Roles and Assign Permissions
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $customer = Role::create(['name' => 'Customer']);
        // $finance = Role::create(['name' => 'Finance']);
        // $support = Role::create(['name' => 'Support']);

        $superAdmin->givePermissionTo([
            'manage customers',
            'create customer',
            'edit customer',
            'delete customer',

            'manage vehicles',
            'create vehicle',
            'edit vehicle',
            'delete vehicle',

            'manage rentals',
            'manage documents',
            'view reports',
            'manage roles',
            'manage settings',
            'view vehicles',
            'create rental',
            'view rental history',
            'update profile',
            'upload documents',
            'manage payments',
            'update rental status'
        ]);

        $admin->givePermissionTo([
            'manage customers',
            'create customer',
            'edit customer',
            'delete customer',

            'manage vehicles',
            'manage rentals',
            'manage documents',
            'view reports'
        ]);
        $customer->givePermissionTo([
            'view vehicles',
            'create rental',
            'view rental history',
            'update profile',
            'upload documents'
        ]);
    }
}
