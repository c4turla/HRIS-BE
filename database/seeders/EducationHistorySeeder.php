<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EducationHistory;
use Illuminate\Database\Seeder;

class EducationHistorySeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();

        $educations = [
            // Education for employee 1 (Achmad Pratama)
            [
                'employee_id' => $employees[0]->id,
                'education_level' => 'S1',
                'institution_name' => 'Institut Teknologi Bandung',
                'major' => 'Teknik Informatika',
                'start_year' => 2008,
                'end_year' => 2012,
                'gpa' => 3.75,
            ],

            // Education for employee 2 (Siti Nurhaliza)
            [
                'employee_id' => $employees[1]->id,
                'education_level' => 'S1',
                'institution_name' => 'Universitas Padjadjaran',
                'major' => 'Desain Komunikasi Visual',
                'start_year' => 2013,
                'end_year' => 2017,
                'gpa' => 3.50,
            ],

            // Education for employee 3 (Bambang Sutrisno)
            [
                'employee_id' => $employees[2]->id,
                'education_level' => 'S1',
                'institution_name' => 'Universitas Airlangga',
                'major' => 'Psikologi',
                'start_year' => 2003,
                'end_year' => 2007,
                'gpa' => 3.80,
            ],

            // Education for employee 4 (Dewi Kartika)
            [
                'employee_id' => $employees[3]->id,
                'education_level' => 'S1',
                'institution_name' => 'Universitas Diponegoro',
                'major' => 'Akuntansi',
                'start_year' => 2006,
                'end_year' => 2010,
                'gpa' => 3.60,
            ],
            [
                'employee_id' => $employees[3]->id,
                'education_level' => 'S2',
                'institution_name' => 'Universitas Gadjah Mada',
                'major' => 'Manajemen Keuangan',
                'start_year' => 2011,
                'end_year' => 2013,
                'gpa' => 3.70,
            ],

            // Education for employee 5 (Eko Prasetyo)
            [
                'employee_id' => $employees[4]->id,
                'education_level' => 'S1',
                'institution_name' => 'Universitas Gadjah Mada',
                'major' => 'Ilmu Komunikasi',
                'start_year' => 2010,
                'end_year' => 2014,
                'gpa' => 3.55,
            ],

            // Education for employee 6 (Ferdi Nugraha)
            [
                'employee_id' => $employees[5]->id,
                'education_level' => 'S1',
                'institution_name' => 'Institut Teknologi Sepuluh Nopember',
                'major' => 'Teknik Informatika',
                'start_year' => 2009,
                'end_year' => 2013,
                'gpa' => 3.65,
            ],

            // Education for employee 7 (Gita Pertiwi)
            [
                'employee_id' => $employees[6]->id,
                'education_level' => 'S1',
                'institution_name' => 'Telkom University',
                'major' => 'Sistem Informasi',
                'start_year' => 2014,
                'end_year' => 2018,
                'gpa' => 3.70,
            ],

            // Education for employee 8 (Hendra Wijaya)
            [
                'employee_id' => $employees[7]->id,
                'education_level' => 'S1',
                'institution_name' => 'Universitas Indonesia',
                'major' => 'Teknik Industri',
                'start_year' => 2005,
                'end_year' => 2009,
                'gpa' => 3.45,
            ],

            // Education for employee 9 (Indah Sari)
            [
                'employee_id' => $employees[8]->id,
                'education_level' => 'S1',
                'institution_name' => 'Universitas Sumatera Utara',
                'major' => 'Manajemen',
                'start_year' => 2016,
                'end_year' => 2020,
                'gpa' => 3.60,
            ],

            // Education for employee 10 (Joko Susilo)
            [
                'employee_id' => $employees[9]->id,
                'education_level' => 'S1',
                'institution_name' => 'Universitas Sebelas Maret',
                'major' => 'Teknik Mesin',
                'start_year' => 2004,
                'end_year' => 2008,
                'gpa' => 3.50,
            ],
        ];

        foreach ($educations as $education) {
            EducationHistory::create($education);
        }

        $this->command->info('Education history seeded successfully!');
    }
}
