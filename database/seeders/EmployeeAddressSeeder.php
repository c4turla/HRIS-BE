<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeAddress;
use Illuminate\Database\Seeder;

class EmployeeAddressSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();

        $addresses = [
            // Address for employee 1 (Achmad Pratama)
            [
                'employee_id' => $employees[0]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Melati No. 45 RT 05 RW 12',
                'rt' => '05',
                'rw' => '12',
                'village' => 'Tebet Timur',
                'district' => 'Tebet',
                'city' => 'Jakarta Selatan',
                'province' => 'DKI Jakarta',
                'postal_code' => '12810',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 2 (Siti Nurhaliza)
            [
                'employee_id' => $employees[1]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Mawar No. 78 RT 02 RW 08',
                'rt' => '02',
                'rw' => '08',
                'village' => 'Sukajadi',
                'district' => 'Sumur Bandung',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'postal_code' => '40123',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 3 (Bambang Sutrisno)
            [
                'employee_id' => $employees[2]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Anggrek No. 23 RT 03 RW 10',
                'rt' => '03',
                'rw' => '10',
                'village' => 'Gubeng',
                'district' => 'Gubeng',
                'city' => 'Surabaya',
                'province' => 'Jawa Timur',
                'postal_code' => '60281',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 4 (Dewi Kartika)
            [
                'employee_id' => $employees[3]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Kenari No. 56 RT 01 RW 05',
                'rt' => '01',
                'rw' => '05',
                'village' => 'Purwodinatan',
                'district' => 'Semarang Tengah',
                'city' => 'Semarang',
                'province' => 'Jawa Tengah',
                'postal_code' => '50136',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 5 (Eko Prasetyo)
            [
                'employee_id' => $employees[4]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Merpati No. 34 RT 04 RW 09',
                'rt' => '04',
                'rw' => '09',
                'village' => 'Demangan',
                'district' => 'Depok',
                'city' => 'Sleman',
                'province' => 'DI Yogyakarta',
                'postal_code' => '55281',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 6 (Ferdi Nugraha)
            [
                'employee_id' => $employees[5]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Dahlia No. 67 RT 06 RW 11',
                'rt' => '06',
                'rw' => '11',
                'village' => 'Kebagusan',
                'district' => 'Pasar Minggu',
                'city' => 'Jakarta Selatan',
                'province' => 'DKI Jakarta',
                'postal_code' => '12520',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 7 (Gita Pertiwi)
            [
                'employee_id' => $employees[6]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Melati No. 89 RT 03 RW 07',
                'rt' => '03',
                'rw' => '07',
                'village' => 'Cicendo',
                'district' => 'Cicendo',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'postal_code' => '40175',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 8 (Hendra Wijaya)
            [
                'employee_id' => $employees[7]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Cempaka No. 45 RT 02 RW 06',
                'rt' => '02',
                'rw' => '06',
                'village' => 'Gubeng',
                'district' => 'Gubeng',
                'city' => 'Surabaya',
                'province' => 'Jawa Timur',
                'postal_code' => '60287',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 9 (Indah Sari)
            [
                'employee_id' => $employees[8]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Mawar No. 12 RT 05 RW 10',
                'rt' => '05',
                'rw' => '10',
                'village' => 'Padang Bulan',
                'district' => 'Medan Baru',
                'city' => 'Medan',
                'province' => 'Sumatera Utara',
                'postal_code' => '20152',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 10 (Joko Susilo)
            [
                'employee_id' => $employees[9]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Anggrek No. 78 RT 04 RW 08',
                'rt' => '04',
                'rw' => '08',
                'village' => 'Jebres',
                'district' => 'Jebres',
                'city' => 'Surakarta',
                'province' => 'Jawa Tengah',
                'postal_code' => '57128',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 11 (Kartika Dewi)
            [
                'employee_id' => $employees[10]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Kenari No. 34 RT 02 RW 05',
                'rt' => '02',
                'rw' => '05',
                'village' => 'Demangan',
                'district' => 'Depok',
                'city' => 'Sleman',
                'province' => 'DI Yogyakarta',
                'postal_code' => '55282',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],

            // Address for employee 12 (Lukman Hakim)
            [
                'employee_id' => $employees[11]->id,
                'address_type' => 'Rumah',
                'street_address' => 'Jl. Dahlia No. 56 RT 03 RW 07',
                'rt' => '03',
                'rw' => '07',
                'village' => 'Sampangan',
                'district' => 'Gajah Mungkur',
                'city' => 'Semarang',
                'province' => 'Jawa Tengah',
                'postal_code' => '50233',
                'country' => 'Indonesia',
                'is_primary' => true,
            ],
        ];

        foreach ($addresses as $address) {
            EmployeeAddress::create($address);
        }

        $this->command->info('Employee addresses seeded successfully!');
    }
}
