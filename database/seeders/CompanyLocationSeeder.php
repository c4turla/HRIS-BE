<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyLocation;
use Illuminate\Database\Seeder;

class CompanyLocationSeeder extends Seeder
{
    public function run(): void
    {
        $companies = Company::all();

        $locations = [
            [
                'company_id' => $companies[0]->id,
                'name' => 'Kantor Pusat Jakarta',
                'type' => 'Headquarters',
                'address' => 'Jl. Sudirman No. 45, Jakarta Selatan',
                'city' => 'Jakarta',
                'postal_code' => '12190',
                'country' => 'Indonesia',
                'phone' => '+62 21 1234-5678',
                'is_headquarters' => true,
            ],
            [
                'company_id' => $companies[0]->id,
                'name' => 'Kantor Cabang Bandung',
                'type' => 'Branch',
                'address' => 'Jl. Asia Afrika No. 88, Bandung',
                'city' => 'Bandung',
                'postal_code' => '40111',
                'country' => 'Indonesia',
                'phone' => '+62 22 4234-5678',
                'is_headquarters' => false,
            ],
            [
                'company_id' => $companies[1]->id,
                'name' => 'Kantor Pusat',
                'type' => 'Headquarters',
                'address' => 'Jl. Gatot Subroto No. 88, Jakarta Pusat',
                'city' => 'Jakarta',
                'postal_code' => '10270',
                'country' => 'Indonesia',
                'phone' => '+62 21 2345-6789',
                'is_headquarters' => true,
            ],
            [
                'company_id' => $companies[1]->id,
                'name' => 'Kantor Cabang Surabaya',
                'type' => 'Branch',
                'address' => 'Jl. Tunjungan No. 12, Surabaya',
                'city' => 'Surabaya',
                'postal_code' => '60263',
                'country' => 'Indonesia',
                'phone' => '+62 31 5345-6789',
                'is_headquarters' => false,
            ],
            [
                'company_id' => $companies[2]->id,
                'name' => 'Kantor Utama',
                'type' => 'Headquarters',
                'address' => 'Jl. Ahmad Yani No. 123, Surabaya',
                'city' => 'Surabaya',
                'postal_code' => '60233',
                'country' => 'Indonesia',
                'phone' => '+62 31 3456-7890',
                'is_headquarters' => true,
            ],
        ];

        foreach ($locations as $location) {
            CompanyLocation::create($location);
        }

        $this->command->info('Company locations seeded successfully!');
    }
}
