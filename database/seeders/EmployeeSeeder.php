<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Department;
use App\Models\Position;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();
        $departments = Department::all();
        $positions = Position::all();

        $employees = [
            // Employees for Company 1 (PT Teknologi Indonesia Maju)
            [
                'nik' => '3175000101010001',
                'full_name' => 'Achmad Pratama',
                'gender' => 'male',
                'email' => 'achmad@teknologi-indonesia.co.id',
                'phone_number' => '+62 812 3456 7890',
                'current_company_id' => $companies[0]->id,
                'current_department_id' => $departments[0]->id,
                'current_position_id' => $positions[0]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2020-01-15',
                'date_of_birth' => '1990-05-20',
                'place_of_birth' => 'Jakarta',
                'marital_status' => 'married',
                'religion' => 'Islam',
                'blood_type' => 'O',
            ],
            [
                'nik' => '3175000202020002',
                'full_name' => 'Siti Nurhaliza',
                'gender' => 'female',
                'email' => 'siti.n@teknologi-indonesia.co.id',
                'phone_number' => '+62 812 2345 6789',
                'current_company_id' => $companies[0]->id,
                'current_department_id' => $departments[0]->id,
                'current_position_id' => $positions[1]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2022-03-10',
                'date_of_birth' => '1995-08-15',
                'place_of_birth' => 'Bandung',
                'marital_status' => 'single',
                'religion' => 'Islam',
                'blood_type' => 'A',
            ],
            [
                'nik' => '3175000303030003',
                'full_name' => 'Bambang Sutrisno',
                'gender' => 'male',
                'email' => 'bambang@teknologi-indonesia.co.id',
                'phone_number' => '+62 813 4567 8901',
                'current_company_id' => $companies[0]->id,
                'current_department_id' => $departments[1]->id,
                'current_position_id' => $positions[2]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2019-06-01',
                'date_of_birth' => '1985-03-25',
                'place_of_birth' => 'Surabaya',
                'marital_status' => 'married',
                'religion' => 'Islam',
                'blood_type' => 'B',
            ],
            [
                'nik' => '3175000404040004',
                'full_name' => 'Dewi Kartika',
                'gender' => 'female',
                'email' => 'dewi@teknologi-indonesia.co.id',
                'phone_number' => '+62 814 5678 9012',
                'current_company_id' => $companies[0]->id,
                'current_department_id' => $departments[2]->id,
                'current_position_id' => $positions[3]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2018-09-15',
                'date_of_birth' => '1988-11-30',
                'place_of_birth' => 'Semarang',
                'marital_status' => 'married',
                'religion' => 'Kristen',
                'blood_type' => 'AB',
            ],
            [
                'nik' => '3175000505050005',
                'full_name' => 'Eko Prasetyo',
                'gender' => 'male',
                'email' => 'eko@teknologi-indonesia.co.id',
                'phone_number' => '+62 815 6789 0123',
                'current_company_id' => $companies[0]->id,
                'current_department_id' => $departments[3]->id,
                'current_position_id' => $positions[4]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2021-02-01',
                'date_of_birth' => '1992-07-18',
                'place_of_birth' => 'Yogyakarta',
                'marital_status' => 'single',
                'religion' => 'Islam',
                'blood_type' => 'O',
            ],

            // Employees for Company 2 (PT Solusi Digital Nusantara)
            [
                'nik' => '3176000101010006',
                'full_name' => 'Ferdi Nugraha',
                'gender' => 'male',
                'email' => 'ferdi@solusi-digital.com',
                'phone_number' => '+62 816 7890 1234',
                'current_company_id' => $companies[1]->id,
                'current_department_id' => $departments[4]->id,
                'current_position_id' => $positions[5]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2021-05-20',
                'date_of_birth' => '1991-04-10',
                'place_of_birth' => 'Jakarta',
                'marital_status' => 'married',
                'religion' => 'Islam',
                'blood_type' => 'A',
            ],
            [
                'nik' => '3176000202020007',
                'full_name' => 'Gita Pertiwi',
                'gender' => 'female',
                'email' => 'gita@solusi-digital.com',
                'phone_number' => '+62 817 8901 2345',
                'current_company_id' => $companies[1]->id,
                'current_department_id' => $departments[4]->id,
                'current_position_id' => $positions[6]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2022-01-10',
                'date_of_birth' => '1996-09-25',
                'place_of_birth' => 'Bandung',
                'marital_status' => 'single',
                'religion' => 'Islam',
                'blood_type' => 'O',
            ],
            [
                'nik' => '3176000303030008',
                'full_name' => 'Hendra Wijaya',
                'gender' => 'male',
                'email' => 'hendra@solusi-digital.com',
                'phone_number' => '+62 818 9012 3456',
                'current_company_id' => $companies[1]->id,
                'current_department_id' => $departments[5]->id,
                'current_position_id' => $positions[7]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2020-08-15',
                'date_of_birth' => '1987-02-28',
                'place_of_birth' => 'Surabaya',
                'marital_status' => 'married',
                'religion' => 'Kristen',
                'blood_type' => 'B',
            ],
            [
                'nik' => '3176000404040009',
                'full_name' => 'Indah Sari',
                'gender' => 'female',
                'email' => 'indah@solusi-digital.com',
                'phone_number' => '+62 819 0123 4567',
                'current_company_id' => $companies[1]->id,
                'current_department_id' => $departments[6]->id,
                'current_position_id' => $positions[8]->id,
                'current_employment_status' => 'Contract',
                'join_date' => '2023-04-01',
                'date_of_birth' => '1998-12-05',
                'place_of_birth' => 'Medan',
                'marital_status' => 'single',
                'religion' => 'Islam',
                'blood_type' => 'A',
            ],

            // Employees for Company 3 (CV Maju Bersama)
            [
                'nik' => '3177000101010010',
                'full_name' => 'Joko Susilo',
                'gender' => 'male',
                'email' => 'joko@maju-bersama.co.id',
                'phone_number' => '+62 821 2345 6789',
                'current_company_id' => $companies[2]->id,
                'current_department_id' => $departments[7]->id,
                'current_position_id' => $positions[9]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2019-03-20',
                'date_of_birth' => '1986-06-15',
                'place_of_birth' => 'Solo',
                'marital_status' => 'married',
                'religion' => 'Islam',
                'blood_type' => 'O',
            ],
            [
                'nik' => '3177000202020011',
                'full_name' => 'Kartika Dewi',
                'gender' => 'female',
                'email' => 'kartika@maju-bersama.co.id',
                'phone_number' => '+62 822 3456 7890',
                'current_company_id' => $companies[2]->id,
                'current_department_id' => $departments[7]->id,
                'current_position_id' => $positions[10]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2021-07-10',
                'date_of_birth' => '1994-10-20',
                'place_of_birth' => 'Yogyakarta',
                'marital_status' => 'single',
                'religion' => 'Islam',
                'blood_type' => 'B',
            ],
            [
                'nik' => '3177000303030012',
                'full_name' => 'Lukman Hakim',
                'gender' => 'male',
                'email' => 'lukman@maju-bersama.co.id',
                'phone_number' => '+62 823 4567 8901',
                'current_company_id' => $companies[2]->id,
                'current_department_id' => $departments[8]->id,
                'current_position_id' => $positions[11]->id,
                'current_employment_status' => 'Permanent',
                'join_date' => '2020-11-01',
                'date_of_birth' => '1989-03-12',
                'place_of_birth' => 'Semarang',
                'marital_status' => 'married',
                'religion' => 'Islam',
                'blood_type' => 'A',
            ],
        ];

        foreach ($employees as $employee) {
            $employee['employee_id'] = Str::uuid()->toString();
            Employee::create($employee);
        }

        $this->command->info('Employees seeded successfully!');
    }
}
