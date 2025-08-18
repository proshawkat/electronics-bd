<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);
        $salesman = Role::create(['name' => 'salesman']);
        $customer = Role::create(['name' => 'customer']);

        // Permissions (example for models)
        $permissions = [
            'manage users',
            'manage products',
            'manage orders',
            'view reports'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Admin gets all permissions
        $admin->givePermissionTo(Permission::all());

        // Manager gets selected permissions
        $manager->givePermissionTo(['manage products', 'manage orders', 'view reports']);

        // Salesman gets selected permissions
        $salesman->givePermissionTo(['manage orders']);
    }
}
