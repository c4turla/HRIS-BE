<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $companies = [
            [
                'name' => 'PT Teknologi Indonesia Maju',
                'industry' => 'Technology',
                'status' => 'Aktif',
                'address' => 'Jl. Sudirman No. 45, Jakarta Selatan',
                'city' => 'Jakarta',
                'postal_code' => '12190',
                'country' => 'Indonesia',
                'phone' => '+62 21 1234-5678',
                'email' => 'info@teknologi-indonesia.co.id',
                'website' => 'https://www.teknologi-indonesia.co.id',
                'description' => 'Perusahaan teknologi terdepan di Indonesia',
            ],
            [
                'name' => 'PT Solusi Digital Nusantara',
                'industry' => 'Software Development',
                'status' => 'Aktif',
                'address' => 'Jl. Gatot Subroto No. 88, Jakarta Pusat',
                'city' => 'Jakarta',
                'postal_code' => '10270',
                'country' => 'Indonesia',
                'phone' => '+62 21 2345-6789',
                'email' => 'contact@solusi-digital.com',
                'website' => 'https://www.solusi-digital.com',
                'description' => 'Penyedia solusi digital dan software',
            ],
            [
                'name' => 'CV Maju Bersama',
                'industry' => 'Trading',
                'status' => 'Aktif',
                'address' => 'Jl. Ahmad Yani No. 123, Surabaya',
                'city' => 'Surabaya',
                'postal_code' => '60233',
                'country' => 'Indonesia',
                'phone' => '+62 31 3456-7890',
                'email' => 'admin@maju-bersama.co.id',
                'website' => 'https://www.maju-bersama.co.id',
                'description' => 'Perusahaan perdagangan dan jasa',
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }

        $this->command->info('Companies seeded successfully!');
    }
}
