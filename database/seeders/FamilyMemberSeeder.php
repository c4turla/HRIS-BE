<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\FamilyMember;
use Illuminate\Database\Seeder;

class FamilyMemberSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();

        $familyMembers = [
            // Family for employee 1 (Achmad Pratama - Married)
            [
                'employee_id' => $employees[0]->id,
                'relationship_type' => 'Istri',
                'full_name' => 'Rina Pratama',
                'gender' => 'female',
                'date_of_birth' => '1992-03-15',
                'occupation' => 'Guru',
                'is_dependent' => true,
                'nik' => '3275000101010001',
            ],
            [
                'employee_id' => $employees[0]->id,
                'relationship_type' => 'Anak',
                'full_name' => 'Aditya Pratama',
                'gender' => 'male',
                'date_of_birth' => '2018-06-20',
                'occupation' => null,
                'is_dependent' => true,
                'nik' => '3175000101010002',
            ],

            // Family for employee 3 (Bambang Sutrisno - Married)
            [
                'employee_id' => $employees[2]->id,
                'relationship_type' => 'Istri',
                'full_name' => 'Dian Sutrisno',
                'gender' => 'female',
                'date_of_birth' => '1988-09-10',
                'occupation' => 'Ibu Rumah Tangga',
                'is_dependent' => true,
                'nik' => '3275000202020001',
            ],
            [
                'employee_id' => $employees[2]->id,
                'relationship_type' => 'Anak',
                'full_name' => 'Rizky Sutrisno',
                'gender' => 'male',
                'date_of_birth' => '2015-02-14',
                'occupation' => null,
                'is_dependent' => true,
                'nik' => '3175000202020002',
            ],
            [
                'employee_id' => $employees[2]->id,
                'relationship_type' => 'Anak',
                'full_name' => 'Siti Sutrisno',
                'gender' => 'female',
                'date_of_birth' => '2019-08-25',
                'occupation' => null,
                'is_dependent' => true,
                'nik' => '3175000202020003',
            ],

            // Family for employee 4 (Dewi Kartika - Married)
            [
                'employee_id' => $employees[3]->id,
                'relationship_type' => 'Suami',
                'full_name' => 'Eko Kartika',
                'gender' => 'male',
                'date_of_birth' => '1987-05-30',
                'occupation' => 'Wiraswasta',
                'is_dependent' => false,
                'nik' => '3275000303030001',
            ],

            // Family for employee 5 (Ferdi Nugraha - Married)
            [
                'employee_id' => $employees[5]->id,
                'relationship_type' => 'Istri',
                'full_name' => 'Linda Nugraha',
                'gender' => 'female',
                'date_of_birth' => '1993-08-12',
                'occupation' => 'Karyawan Swasta',
                'is_dependent' => false,
                'nik' => '3276000101010001',
            ],
            [
                'employee_id' => $employees[5]->id,
                'relationship_type' => 'Anak',
                'full_name' => 'Bagas Nugraha',
                'gender' => 'male',
                'date_of_birth' => '2020-04-18',
                'occupation' => null,
                'is_dependent' => true,
                'nik' => '3176000101010001',
            ],

            // Family for employee 8 (Hendra Wijaya - Married)
            [
                'employee_id' => $employees[7]->id,
                'relationship_type' => 'Istri',
                'full_name' => 'Maya Wijaya',
                'gender' => 'female',
                'date_of_birth' => '1989-11-20',
                'occupation' => 'Karyawan Swasta',
                'is_dependent' => false,
                'nik' => '3276000303030001',
            ],
            [
                'employee_id' => $employees[7]->id,
                'relationship_type' => 'Anak',
                'full_name' => 'Rara Wijaya',
                'gender' => 'female',
                'date_of_birth' => '2017-03-15',
                'occupation' => null,
                'is_dependent' => true,
                'nik' => '3176000303030001',
            ],
            [
                'employee_id' => $employees[7]->id,
                'relationship_type' => 'Anak',
                'full_name' => 'Rizky Wijaya',
                'gender' => 'male',
                'date_of_birth' => '2021-07-22',
                'occupation' => null,
                'is_dependent' => true,
                'nik' => '3176000303030002',
            ],

            // Family for employee 10 (Joko Susilo - Married)
            [
                'employee_id' => $employees[9]->id,
                'relationship_type' => 'Istri',
                'full_name' => 'Sri Susilo',
                'gender' => 'female',
                'date_of_birth' => '1988-01-05',
                'occupation' => 'Ibu Rumah Tangga',
                'is_dependent' => true,
                'nik' => '3277000101010001',
            ],
            [
                'employee_id' => $employees[9]->id,
                'relationship_type' => 'Anak',
                'full_name' => 'Dimas Susilo',
                'gender' => 'male',
                'date_of_birth' => '2014-09-28',
                'occupation' => null,
                'is_dependent' => true,
                'nik' => '3177000101010001',
            ],
            [
                'employee_id' => $employees[9]->id,
                'relationship_type' => 'Anak',
                'full_name' => 'Dinda Susilo',
                'gender' => 'female',
                'date_of_birth' => '2018-12-10',
                'occupation' => null,
                'is_dependent' => true,
                'nik' => '3177000101010002',
            ],

            // Family for employee 12 (Lukman Hakim - Married)
            [
                'employee_id' => $employees[11]->id,
                'relationship_type' => 'Istri',
                'full_name' => 'Rina Hakim',
                'gender' => 'female',
                'date_of_birth' => '1991-07-08',
                'occupation' => 'Guru',
                'is_dependent' => false,
                'nik' => '3277000303030001',
            ],
            [
                'employee_id' => $employees[11]->id,
                'relationship_type' => 'Anak',
                'full_name' => 'Naufal Hakim',
                'gender' => 'male',
                'date_of_birth' => '2019-01-15',
                'occupation' => null,
                'is_dependent' => true,
                'nik' => '3177000303030001',
            ],
        ];

        foreach ($familyMembers as $member) {
            FamilyMember::create($member);
        }

        $this->command->info('Family members seeded successfully!');
    }
}
