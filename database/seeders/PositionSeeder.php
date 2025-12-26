<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();
        $departments = Department::all();

        $positions = [
            // Positions for Company 1
            [
                'name' => 'Senior Software Engineer',
                'code' => 'SSE001',
                'description' => 'Senior developer dengan 5+ tahun pengalaman',
                'level' => 5,
                'base_salary' => 25000000,
                'company_id' => $companies[0]->id,
                'department_id' => $departments[0]->id, // IT
            ],
            [
                'name' => 'Junior Software Engineer',
                'code' => 'JSE001',
                'description' => 'Junior developer 1-2 tahun pengalaman',
                'level' => 3,
                'base_salary' => 12000000,
                'company_id' => $companies[0]->id,
                'department_id' => $departments[0]->id, // IT
            ],
            [
                'name' => 'HR Manager',
                'code' => 'HRM001',
                'description' => 'Manajer HR',
                'level' => 4,
                'base_salary' => 20000000,
                'company_id' => $companies[0]->id,
                'department_id' => $departments[1]->id, // HR
            ],
            [
                'name' => 'Finance Manager',
                'code' => 'FM001',
                'description' => 'Manajer keuangan',
                'level' => 4,
                'base_salary' => 22000000,
                'company_id' => $companies[0]->id,
                'department_id' => $departments[2]->id, // Finance
            ],
            [
                'name' => 'Marketing Specialist',
                'code' => 'MKS001',
                'description' => 'Spesialis pemasaran',
                'level' => 3,
                'base_salary' => 10000000,
                'company_id' => $companies[0]->id,
                'department_id' => $departments[3]->id, // Marketing
            ],

            // Positions for Company 2
            [
                'name' => 'Backend Developer',
                'code' => 'BD001',
                'description' => 'Developer backend',
                'level' => 4,
                'base_salary' => 18000000,
                'company_id' => $companies[1]->id,
                'department_id' => $departments[4]->id, // Software Development
            ],
            [
                'name' => 'Frontend Developer',
                'code' => 'FD001',
                'description' => 'Developer frontend',
                'level' => 4,
                'base_salary' => 18000000,
                'company_id' => $companies[1]->id,
                'department_id' => $departments[4]->id, // Software Development
            ],
            [
                'name' => 'Operations Manager',
                'code' => 'OM001',
                'description' => 'Manajer operasional',
                'level' => 4,
                'base_salary' => 19000000,
                'company_id' => $companies[1]->id,
                'department_id' => $departments[5]->id, // Operations
            ],
            [
                'name' => 'Customer Service Representative',
                'code' => 'CSR001',
                'description' => 'Representatif layanan pelanggan',
                'level' => 2,
                'base_salary' => 7000000,
                'company_id' => $companies[1]->id,
                'department_id' => $departments[6]->id, // Customer Service
            ],

            // Positions for Company 3
            [
                'name' => 'Sales Manager',
                'code' => 'SM001',
                'description' => 'Manajer penjualan',
                'level' => 4,
                'base_salary' => 15000000,
                'company_id' => $companies[2]->id,
                'department_id' => $departments[7]->id, // Sales
            ],
            [
                'name' => 'Sales Executive',
                'code' => 'SE001',
                'description' => 'Eksekutif penjualan',
                'level' => 2,
                'base_salary' => 6000000,
                'company_id' => $companies[2]->id,
                'department_id' => $departments[7]->id, // Sales
            ],
            [
                'name' => 'Logistics Coordinator',
                'code' => 'LC001',
                'description' => 'Koordinator logistik',
                'level' => 3,
                'base_salary' => 9000000,
                'company_id' => $companies[2]->id,
                'department_id' => $departments[8]->id, // Logistics
            ],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }

        $this->command->info('Positions seeded successfully!');
    }
}
