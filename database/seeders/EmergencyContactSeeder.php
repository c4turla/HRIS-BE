<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmergencyContact;
use Illuminate\Database\Seeder;

class EmergencyContactSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();

        $emergencyContacts = [
            // Emergency contact for employee 1 (Achmad Pratama)
            [
                'employee_id' => $employees[0]->id,
                'name' => 'M. Fauzi Pratama',
                'relationship' => 'Brother',
                'phone_number' => '+62 811 2345 6789',
                'address' => 'Jl. Melati No. 45 RT 05 RW 12, Jakarta Selatan',
            ],
            [
                'employee_id' => $employees[0]->id,
                'name' => 'Nur Aini',
                'relationship' => 'Mother',
                'phone_number' => '+62 811 3456 7890',
                'address' => 'Jl. Melati No. 45 RT 05 RW 12, Jakarta Selatan',
            ],

            // Emergency contact for employee 2 (Siti Nurhaliza)
            [
                'employee_id' => $employees[1]->id,
                'name' => 'Ahmad Nurhaliza',
                'relationship' => 'Father',
                'phone_number' => '+62 812 9876 5432',
                'address' => 'Jl. Mawar No. 12 RT 02 RW 08, Bandung',
            ],

            // Emergency contact for employee 3 (Bambang Sutrisno)
            [
                'employee_id' => $employees[2]->id,
                'name' => 'Siti Sutrisno',
                'relationship' => 'Spouse',
                'phone_number' => '+62 813 1234 5678',
                'address' => 'Jl. Kenari No. 78 RT 03 RW 10, Surabaya',
            ],
            [
                'employee_id' => $employees[2]->id,
                'name' => 'Haryono Sutrisno',
                'relationship' => 'Brother',
                'phone_number' => '+62 813 2345 6789',
                'address' => 'Jl. Kenari No. 78 RT 03 RW 10, Surabaya',
            ],

            // Emergency contact for employee 4 (Dewi Kartika)
            [
                'employee_id' => $employees[3]->id,
                'name' => 'Eko Kartika',
                'relationship' => 'Spouse',
                'phone_number' => '+62 814 9876 5432',
                'address' => 'Jl. Anggrek No. 34 RT 01 RW 05, Semarang',
            ],

            // Emergency contact for employee 5 (Eko Prasetyo)
            [
                'employee_id' => $employees[4]->id,
                'name' => 'Budi Prasetyo',
                'relationship' => 'Brother',
                'phone_number' => '+62 815 5432 1098',
                'address' => 'Jl. Cendrawasih No. 56 RT 04 RW 09, Yogyakarta',
            ],

            // Emergency contact for employee 6 (Ferdi Nugraha)
            [
                'employee_id' => $employees[5]->id,
                'name' => 'Linda Nugraha',
                'relationship' => 'Spouse',
                'phone_number' => '+62 816 5432 1098',
                'address' => 'Jl. Dahlia No. 23 RT 06 RW 11, Jakarta Selatan',
            ],
            [
                'employee_id' => $employees[5]->id,
                'name' => 'Bambang Nugraha',
                'relationship' => 'Father',
                'phone_number' => '+62 816 6543 2109',
                'address' => 'Jl. Dahlia No. 23 RT 06 RW 11, Jakarta Selatan',
            ],

            // Emergency contact for employee 7 (Gita Pertiwi)
            [
                'employee_id' => $employees[6]->id,
                'name' => 'Hasan Pertiwi',
                'relationship' => 'Father',
                'phone_number' => '+62 817 8765 4321',
                'address' => 'Jl. Tulip No. 89 RT 02 RW 07, Bandung',
            ],

            // Emergency contact for employee 8 (Hendra Wijaya)
            [
                'employee_id' => $employees[7]->id,
                'name' => 'Maya Wijaya',
                'relationship' => 'Spouse',
                'phone_number' => '+62 818 7654 3210',
                'address' => 'Jl. Kencana No. 67 RT 05 RW 13, Surabaya',
            ],
            [
                'employee_id' => $employees[7]->id,
                'name' => 'Agus Wijaya',
                'relationship' => 'Brother',
                'phone_number' => '+62 818 6543 2109',
                'address' => 'Jl. Kencana No. 67 RT 05 RW 13, Surabaya',
            ],

            // Emergency contact for employee 9 (Indah Sari)
            [
                'employee_id' => $employees[8]->id,
                'name' => 'Rudi Sari',
                'relationship' => 'Brother',
                'phone_number' => '+62 819 9876 5432',
                'address' => 'Jl. Melur No. 45 RT 01 RW 06, Medan',
            ],

            // Emergency contact for employee 10 (Joko Susilo)
            [
                'employee_id' => $employees[9]->id,
                'name' => 'Sri Susilo',
                'relationship' => 'Spouse',
                'phone_number' => '+62 821 9876 5432',
                'address' => 'Jl. Mawar Putih No. 34 RT 03 RW 08, Solo',
            ],
            [
                'employee_id' => $employees[9]->id,
                'name' => 'Agus Susilo',
                'relationship' => 'Brother',
                'phone_number' => '+62 821 8765 4321',
                'address' => 'Jl. Mawar Putih No. 34 RT 03 RW 08, Solo',
            ],

            // Emergency contact for employee 11 (Kartika Dewi)
            [
                'employee_id' => $employees[10]->id,
                'name' => 'Dewi Kartika',
                'relationship' => 'Sister',
                'phone_number' => '+62 822 7654 3210',
                'address' => 'Jl. Kenanga No. 56 RT 02 RW 09, Yogyakarta',
            ],

            // Emergency contact for employee 12 (Lukman Hakim)
            [
                'employee_id' => $employees[11]->id,
                'name' => 'Rina Hakim',
                'relationship' => 'Spouse',
                'phone_number' => '+62 823 8765 4321',
                'address' => 'Jl. Cempaka No. 78 RT 04 RW 12, Semarang',
            ],
            [
                'employee_id' => $employees[11]->id,
                'name' => 'Budi Hakim',
                'relationship' => 'Brother',
                'phone_number' => '+62 823 7654 3210',
                'address' => 'Jl. Cempaka No. 78 RT 04 RW 12, Semarang',
            ],
        ];

        foreach ($emergencyContacts as $contact) {
            EmergencyContact::create($contact);
        }

        $this->command->info('Emergency contacts seeded successfully!');
    }
}
