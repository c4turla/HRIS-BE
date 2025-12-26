<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();
        $roles = Role::all();

        $users = [
            // Super Admin
            [
                'name' => 'Super Administrator',
                'email' => 'admin@modis.co.id',
                'password' => Hash::make('password123'),
                'role_id' => $roles[0]->id, // Super Admin
                'company_id' => $companies[0]->id,
            ],
            // HR Manager Company 1
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@teknologi-indonesia.co.id',
                'password' => Hash::make('password123'),
                'role_id' => $roles[1]->id, // HR Manager
                'company_id' => $companies[0]->id,
            ],
            // Finance Manager Company 1
            [
                'name' => 'Siti Rahayu',
                'email' => 'siti@teknologi-indonesia.co.id',
                'password' => Hash::make('password123'),
                'role_id' => $roles[2]->id, // Finance Manager
                'company_id' => $companies[0]->id,
            ],
            // Manager Company 1
            [
                'name' => 'Andi Wijaya',
                'email' => 'andi@teknologi-indonesia.co.id',
                'password' => Hash::make('password123'),
                'role_id' => $roles[4]->id, // Manager
                'company_id' => $companies[0]->id,
            ],
            // Admin Company 2
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@solusi-digital.com',
                'password' => Hash::make('password123'),
                'role_id' => $roles[5]->id, // Admin
                'company_id' => $companies[1]->id,
            ],
            // HR Manager Company 2
            [
                'name' => 'Rudi Hartono',
                'email' => 'rudi@solusi-digital.com',
                'password' => Hash::make('password123'),
                'role_id' => $roles[1]->id, // HR Manager
                'company_id' => $companies[1]->id,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $this->command->info('Users seeded successfully!');
    }
}
