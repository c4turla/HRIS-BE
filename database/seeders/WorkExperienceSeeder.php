<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\WorkExperience;
use Illuminate\Database\Seeder;

class WorkExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();

        $workExperiences = [
            // Work experience for employee 1 (Achmad Pratama)
            [
                'employee_id' => $employees[0]->id,
                'company_name' => 'PT Digital Vision',
                'position' => 'Software Engineer',
                'start_date' => '2012-09-01',
                'end_date' => '2015-08-31',
                'job_description' => 'Developed web applications using Laravel and Vue.js',
            ],
            [
                'employee_id' => $employees[0]->id,
                'company_name' => 'PT Creative Solutions',
                'position' => 'Senior Software Engineer',
                'start_date' => '2015-10-01',
                'end_date' => '2019-12-31',
                'job_description' => 'Led development team of 5 developers',
            ],

            // Work experience for employee 2 (Siti Nurhaliza)
            [
                'employee_id' => $employees[1]->id,
                'company_name' => 'Studio Design Indonesia',
                'position' => 'Junior Designer',
                'start_date' => '2017-09-01',
                'end_date' => '2019-08-31',
                'job_description' => 'Created UI/UX designs for web and mobile apps',
            ],

            // Work experience for employee 3 (Bambang Sutrisno)
            [
                'employee_id' => $employees[2]->id,
                'company_name' => 'PT HR Consult Indonesia',
                'position' => 'HR Assistant',
                'start_date' => '2007-09-01',
                'end_date' => '2010-08-31',
                'job_description' => 'Handled recruitment and employee relations',
            ],
            [
                'employee_id' => $employees[2]->id,
                'company_name' => 'PT Manajemen Resources',
                'position' => 'HR Supervisor',
                'start_date' => '2010-10-01',
                'end_date' => '2014-05-31',
                'job_description' => 'Supervised HR team of 3 people',
            ],
            [
                'employee_id' => $employees[2]->id,
                'company_name' => 'PT Global HR Solutions',
                'position' => 'HR Manager',
                'start_date' => '2014-09-01',
                'end_date' => '2019-05-31',
                'job_description' => 'Managed HR operations for 200+ employees',
            ],

            // Work experience for employee 4 (Dewi Kartika)
            [
                'employee_id' => $employees[3]->id,
                'company_name' => 'KAP Akuntan Terpercaya',
                'position' => 'Junior Accountant',
                'start_date' => '2010-09-01',
                'end_date' => '2013-08-31',
                'job_description' => 'Handled bookkeeping and financial reports',
            ],
            [
                'employee_id' => $employees[3]->id,
                'company_name' => 'PT Financial Services',
                'position' => 'Senior Accountant',
                'start_date' => '2013-10-01',
                'end_date' => '2018-08-31',
                'job_description' => 'Managed financial reporting and auditing',
            ],

            // Work experience for employee 5 (Eko Prasetyo)
            [
                'employee_id' => $employees[4]->id,
                'company_name' => 'PT Media Digital',
                'position' => 'Marketing Intern',
                'start_date' => '2014-09-01',
                'end_date' => '2015-08-31',
                'job_description' => 'Assisted in digital marketing campaigns',
            ],
            [
                'employee_id' => $employees[4]->id,
                'company_name' => 'PT Creative Agency',
                'position' => 'Marketing Executive',
                'start_date' => '2016-02-01',
                'end_date' => '2020-12-31',
                'job_description' => 'Managed social media and content marketing',
            ],

            // Work experience for employee 6 (Ferdi Nugraha)
            [
                'employee_id' => $employees[5]->id,
                'company_name' => 'PT Startup Indonesia',
                'position' => 'Backend Developer',
                'start_date' => '2013-09-01',
                'end_date' => '2016-08-31',
                'job_description' => 'Developed RESTful APIs using PHP Laravel',
            ],
            [
                'employee_id' => $employees[5]->id,
                'company_name' => 'PT Tech Solutions',
                'position' => 'Senior Backend Developer',
                'start_date' => '2016-10-01',
                'end_date' => '2021-04-30',
                'job_description' => 'Led backend development team',
            ],

            // Work experience for employee 7 (Gita Pertiwi)
            [
                'employee_id' => $employees[6]->id,
                'company_name' => 'PT Web Development',
                'position' => 'Frontend Developer',
                'start_date' => '2018-09-01',
                'end_date' => '2021-08-31',
                'job_description' => 'Developed responsive web interfaces',
            ],

            // Work experience for employee 8 (Hendra Wijaya)
            [
                'employee_id' => $employees[7]->id,
                'company_name' => 'PT Logistics Indonesia',
                'position' => 'Operations Assistant',
                'start_date' => '2009-09-01',
                'end_date' => '2013-08-31',
                'job_description' => 'Assisted in daily operations',
            ],
            [
                'employee_id' => $employees[7]->id,
                'company_name' => 'PT Supply Chain Solutions',
                'position' => 'Operations Supervisor',
                'start_date' => '2013-10-01',
                'end_date' => '2018-07-31',
                'job_description' => 'Supervised warehouse operations',
            ],
            [
                'employee_id' => $employees[7]->id,
                'company_name' => 'PT Global Logistics',
                'position' => 'Operations Manager',
                'start_date' => '2018-09-01',
                'end_date' => '2020-07-31',
                'job_description' => 'Managed operations for 3 warehouses',
            ],

            // Work experience for employee 9 (Indah Sari)
            [
                'employee_id' => $employees[8]->id,
                'company_name' => 'PT Call Center Indonesia',
                'position' => 'Customer Service Intern',
                'start_date' => '2020-09-01',
                'end_date' => '2021-08-31',
                'job_description' => 'Handled customer inquiries via phone and email',
            ],
            [
                'employee_id' => $employees[8]->id,
                'company_name' => 'PT Support Services',
                'position' => 'Customer Service Representative',
                'start_date' => '2021-10-01',
                'end_date' => '2023-03-31',
                'job_description' => 'Provided technical support to customers',
            ],

            // Work experience for employee 10 (Joko Susilo)
            [
                'employee_id' => $employees[9]->id,
                'company_name' => 'PT Trading Company',
                'position' => 'Sales Executive',
                'start_date' => '2008-09-01',
                'end_date' => '2013-08-31',
                'job_description' => 'Managed sales accounts in Jakarta area',
            ],
            [
                'employee_id' => $employees[9]->id,
                'company_name' => 'PT Distribution Indonesia',
                'position' => 'Senior Sales Executive',
                'start_date' => '2013-10-01',
                'end_date' => '2019-02-28',
                'job_description' => 'Managed national sales distribution',
            ],
        ];

        foreach ($workExperiences as $experience) {
            WorkExperience::create($experience);
        }

        $this->command->info('Work experiences seeded successfully!');
    }
}
