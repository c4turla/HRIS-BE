<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run all seeders in the correct order
        $this->call([
            // Organization structure
            CompanySeeder::class,
            CompanyLocationSeeder::class,
            DepartmentSeeder::class,
            PositionSeeder::class,
            
            // Users and roles
            RoleSeeder::class,
            UserSeeder::class,
            
            // Employees
            EmployeeSeeder::class,
            
            // Employee details
            FinancialInfoSeeder::class,
            FamilyMemberSeeder::class,
            EmployeeAddressSeeder::class,
            EducationHistorySeeder::class,
            WorkExperienceSeeder::class,
            EmergencyContactSeeder::class,
        ]);
    }
}
