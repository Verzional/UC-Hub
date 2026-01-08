<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Survey;
use App\Models\Wishlist;
use App\Models\Skill;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all student users
        $students = User::where('role', 'student')->get();

        // List of company names that students might wishlist
        $popularCompanies = [
            'Google',
            'Microsoft',
            'Amazon',
            'Meta',
            'Apple',
            'Netflix',
            'Tesla',
            'Spotify',
            'Airbnb',
            'Uber',
            'Tokopedia',
            'Gojek',
            'Traveloka',
            'Bukalapak',
            'Shopee',
            'Grab',
            'Sea Group',
            'Blibli',
            'OVO',
            'Dana',
            'LinkAja',
            'Telkom Indonesia',
            'Bank Mandiri',
            'BCA',
            'Astra International',
        ];

        $interests = [
            'Technology',
            'Finance',
            'Healthcare',
            'Education',
            'E-commerce',
            'Marketing',
            'Design',
            'Data Science',
            'Cybersecurity',
            'Game Development',
        ];

        foreach ($students as $student) {
            // Skip if student already has a survey
            if ($student->survey()->exists()) {
                continue;
            }

            // Create survey for the student
            $survey = Survey::create([
                'user_id' => $student->id,
                'primary_interest' => $interests[array_rand($interests)],
                'cgpa' => round(rand(250, 400) / 100, 2), // Random CGPA between 2.50 and 4.00
            ]);

            // Create 3-5 wishlist entries for each student
            $wishlistCount = rand(3, 5);
            $selectedCompanies = array_rand(array_flip($popularCompanies), $wishlistCount);
            
            if (!is_array($selectedCompanies)) {
                $selectedCompanies = [$selectedCompanies];
            }

            foreach ($selectedCompanies as $companyName) {
                Wishlist::create([
                    'survey_id' => $survey->id,
                    'company_name' => $companyName,
                ]);
            }

            // Attach some skills to the survey (via survey_skill pivot table)
            $skills = Skill::inRandomOrder()->limit(rand(3, 6))->pluck('id');
            $survey->skills()->attach($skills);
        }

        $this->command->info('Surveys and wishlists created successfully!');
        $this->command->info('Total surveys created: ' . Survey::count());
        $this->command->info('Total wishlists created: ' . Wishlist::count());
    }
}
