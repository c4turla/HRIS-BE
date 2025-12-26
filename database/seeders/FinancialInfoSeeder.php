<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\FinancialInfo;
use Illuminate\Database\Seeder;

class FinancialInfoSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();

        $financialInfos = [
            [
                'employee_id' => $employees[0]->id,
                'npwp_number' => '01.234.567.8-901.000',
                'tax_status' => 'TK/0',
                'bpjs_kesehatan_number' => '1234567890123',
                'bpjs_ketenagakerjaan_number' => '1234567890123',
                'bank_name' => 'BCA',
                'bank_account_number' => '1234567890',
                'bank_account_name' => 'Achmad Pratama',
            ],
            [
                'employee_id' => $employees[1]->id,
                'npwp_number' => '01.345.678.9-012.000',
                'tax_status' => 'TK/0',
                'bpjs_kesehatan_number' => '1234567890124',
                'bpjs_ketenagakerjaan_number' => '1234567890124',
                'bank_name' => 'Mandiri',
                'bank_account_number' => '1234567890123',
                'bank_account_name' => 'Siti Nurhaliza',
            ],
            [
                'employee_id' => $employees[2]->id,
                'npwp_number' => '01.456.789.0-123.000',
                'tax_status' => 'TK/1',
                'bpjs_kesehatan_number' => '1234567890125',
                'bpjs_ketenagakerjaan_number' => '1234567890125',
                'bank_name' => 'BNI',
                'bank_account_number' => '1234567890124',
                'bank_account_name' => 'Bambang Sutrisno',
            ],
            [
                'employee_id' => $employees[3]->id,
                'npwp_number' => '01.567.890.1-234.000',
                'tax_status' => 'K/0',
                'bpjs_kesehatan_number' => '1234567890126',
                'bpjs_ketenagakerjaan_number' => '1234567890126',
                'bank_name' => 'BRI',
                'bank_account_number' => '1234567890125',
                'bank_account_name' => 'Dewi Kartika',
            ],
            [
                'employee_id' => $employees[4]->id,
                'npwp_number' => '01.678.901.2-345.000',
                'tax_status' => 'TK/0',
                'bpjs_kesehatan_number' => '1234567890127',
                'bpjs_ketenagakerjaan_number' => '1234567890127',
                'bank_name' => 'CIMB Niaga',
                'bank_account_number' => '1234567890126',
                'bank_account_name' => 'Eko Prasetyo',
            ],
            [
                'employee_id' => $employees[5]->id,
                'npwp_number' => '02.345.678.9-012.001',
                'tax_status' => 'TK/1',
                'bpjs_kesehatan_number' => '1234567890128',
                'bpjs_ketenagakerjaan_number' => '1234567890128',
                'bank_name' => 'BCA',
                'bank_account_number' => '1234567890127',
                'bank_account_name' => 'Ferdi Nugraha',
            ],
            [
                'employee_id' => $employees[6]->id,
                'npwp_number' => '02.456.789.0-123.001',
                'tax_status' => 'TK/0',
                'bpjs_kesehatan_number' => '1234567890129',
                'bpjs_ketenagakerjaan_number' => '1234567890129',
                'bank_name' => 'BCA',
                'bank_account_number' => '1234567890128',
                'bank_account_name' => 'Gita Pertiwi',
            ],
            [
                'employee_id' => $employees[7]->id,
                'npwp_number' => '02.567.890.1-234.001',
                'tax_status' => 'K/2',
                'bpjs_kesehatan_number' => '1234567890130',
                'bpjs_ketenagakerjaan_number' => '1234567890130',
                'bank_name' => 'Mandiri',
                'bank_account_number' => '1234567890129',
                'bank_account_name' => 'Hendra Wijaya',
            ],
            [
                'employee_id' => $employees[8]->id,
                'npwp_number' => '02.678.901.2-345.001',
                'tax_status' => 'TK/0',
                'bpjs_kesehatan_number' => '1234567890131',
                'bpjs_ketenagakerjaan_number' => '1234567890131',
                'bank_name' => 'BNI',
                'bank_account_number' => '1234567890130',
                'bank_account_name' => 'Indah Sari',
            ],
            [
                'employee_id' => $employees[9]->id,
                'npwp_number' => '03.456.789.0-123.002',
                'tax_status' => 'TK/2',
                'bpjs_kesehatan_number' => '1234567890132',
                'bpjs_ketenagakerjaan_number' => '1234567890132',
                'bank_name' => 'BRI',
                'bank_account_number' => '1234567890131',
                'bank_account_name' => 'Joko Susilo',
            ],
        ];

        foreach ($financialInfos as $info) {
            FinancialInfo::create($info);
        }

        $this->command->info('Financial info seeded successfully!');
    }
}
