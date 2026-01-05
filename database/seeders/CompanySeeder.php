<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'TechCorp',
                'description' =>
                    'A leading technology company specializing in software development.',
                'address' => '123 Tech Street, Silicon Valley, CA',
                'website' => 'https://techcorp.com',
                'industry' => 'Technology',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'HealthPlus',
                'description' =>
                    'Healthcare provider offering comprehensive medical services.',
                'address' => '456 Health Ave, New York, NY',
                'website' => 'https://healthplus.com',
                'industry' => 'Healthcare',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'FinanceHub',
                'description' =>
                    'Financial services company providing banking and investment solutions.',
                'address' => '789 Finance Blvd, Chicago, IL',
                'website' => 'https://financehub.com',
                'industry' => 'Finance',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'EduLearn',
                'description' =>
                    'Educational institution focused on online learning platforms.',
                'address' => '101 Education Rd, Boston, MA',
                'website' => 'https://edulearn.com',
                'industry' => 'Education',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'MarketMasters',
                'description' =>
                    'Marketing agency helping brands grow through digital strategies.',
                'address' => '202 Marketing Ln, Los Angeles, CA',
                'website' => 'https://marketmasters.com',
                'industry' => 'Marketing',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'DesignStudio',
                'description' =>
                    'Creative design studio offering graphic and UX/UI services.',
                'address' => '303 Design St, Austin, TX',
                'website' => 'https://designstudio.com',
                'industry' => 'Design',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'GreenEnergy',
                'description' =>
                    'Renewable energy company developing sustainable solutions.',
                'address' => '404 Energy Way, Denver, CO',
                'website' => 'https://greenenergy.com',
                'industry' => 'Energy',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'RetailWorld',
                'description' =>
                    'Retail chain providing consumer goods and services.',
                'address' => '505 Retail Pl, Miami, FL',
                'website' => 'https://retailworld.com',
                'industry' => 'Retail',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'LogiTrans',
                'description' =>
                    'Logistics and transportation company managing supply chains.',
                'address' => '606 Logistics Dr, Atlanta, GA',
                'website' => 'https://logitrans.com',
                'industry' => 'Logistics',
                'profile_photo_path' => null,
            ],
            [
                'name' => 'FoodieDelight',
                'description' =>
                    'Food industry leader in catering and restaurant services.',
                'address' => '707 Food Ct, Seattle, WA',
                'website' => 'https://foodiedelight.com',
                'industry' => 'Food',
                'profile_photo_path' => null,
            ],
        ];

        foreach ($companies as $company) {
            if (!Company::where('name', $company['name'])->exists()) {
                Company::create($company);
            } else {
                echo "Company '{$company['name']}' already exists. Skipping...\n";
            }
        }
    }
}
