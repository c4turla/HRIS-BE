<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'super-admin',
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'Director',
                'slug' => 'director',
            ],
            [
                'name' => 'Manager',
                'slug' => 'manager',
            ],
            [
                'name' => 'HR Manager',
                'slug' => 'hr-manager',
            ],
            [
                'name' => 'Finance Manager',
                'slug' => 'finance-manager',
            ],
            [
                'name' => 'Employee',
                'slug' => 'employee',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $this->command->info('Roles seeded successfully!');
    }
}
