<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();

        $departments = [
            // Departments for Company 1 (PT Teknologi Indonesia Maju)
            [
                'company_id' => $companies[0]->id,
                'name' => 'Information Technology',
                'head' => 'Achmad Pratama',
                'status' => 'Aktif',
                'created' => '2024-01-01',
            ],
            [
                'company_id' => $companies[0]->id,
                'name' => 'Human Resources',
                'head' => 'Bambang Sutrisno',
                'status' => 'Aktif',
                'created' => '2024-01-01',
            ],
            [
                'company_id' => $companies[0]->id,
                'name' => 'Finance',
                'head' => 'Dewi Kartika',
                'status' => 'Aktif',
                'created' => '2024-01-01',
            ],
            [
                'company_id' => $companies[0]->id,
                'name' => 'Marketing',
                'head' => 'Eko Prasetyo',
                'status' => 'Aktif',
                'created' => '2024-01-01',
            ],

            // Departments for Company 2 (PT Solusi Digital Nusantara)
            [
                'company_id' => $companies[1]->id,
                'name' => 'Software Development',
                'head' => 'Ferdi Nugraha',
                'status' => 'Aktif',
                'created' => '2024-01-01',
            ],
            [
                'company_id' => $companies[1]->id,
                'name' => 'Operations',
                'head' => 'Hendra Wijaya',
                'status' => 'Aktif',
                'created' => '2024-01-01',
            ],
            [
                'company_id' => $companies[1]->id,
                'name' => 'Customer Service',
                'head' => 'Indah Sari',
                'status' => 'Aktif',
                'created' => '2024-01-01',
            ],

            // Departments for Company 3 (CV Maju Bersama)
            [
                'company_id' => $companies[2]->id,
                'name' => 'Sales',
                'head' => 'Joko Susilo',
                'status' => 'Aktif',
                'created' => '2024-01-01',
            ],
            [
                'company_id' => $companies[2]->id,
                'name' => 'Logistics',
                'head' => 'Lukman Hakim',
                'status' => 'Aktif',
                'created' => '2024-01-01',
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }

        $this->command->info('Departments seeded successfully!');
    }
}
