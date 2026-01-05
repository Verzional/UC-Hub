<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use Carbon\Carbon;

class JobSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            // Company 1: TechCorp
            [
                'title' => 'Software Engineer',
                'description' => 'Develop and maintain software applications.',
                'location' => 'Silicon Valley, CA',
                'company_id' => 1,
                'employment_type' => 'Full-time',
                'salary' => '$80,000 - $120,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'Data Analyst',
                'description' => 'Analyze data to provide insights.',
                'location' => 'Silicon Valley, CA',
                'company_id' => 1,
                'employment_type' => 'Full-time',
                'salary' => '$60,000 - $90,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'DevOps Engineer',
                'description' => 'Manage infrastructure and deployment.',
                'location' => 'Silicon Valley, CA',
                'company_id' => 1,
                'employment_type' => 'Full-time',
                'salary' => '$90,000 - $130,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            // Company 2: HealthPlus
            [
                'title' => 'Registered Nurse',
                'description' => 'Provide patient care in a hospital setting.',
                'location' => 'New York, NY',
                'company_id' => 2,
                'employment_type' => 'Full-time',
                'salary' => '$70,000 - $100,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '07:00:00',
                'end_time' => '19:00:00',
            ],
            [
                'title' => 'Pharmacist',
                'description' => 'Dispense medications and advise patients.',
                'location' => 'New York, NY',
                'company_id' => 2,
                'employment_type' => 'Full-time',
                'salary' => '$100,000 - $140,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'Physical Therapist',
                'description' => 'Help patients recover from injuries.',
                'location' => 'New York, NY',
                'company_id' => 2,
                'employment_type' => 'Part-time',
                'salary' => '$50,000 - $80,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
            ],
            // Company 3: FinanceHub
            [
                'title' => 'Financial Analyst',
                'description' => 'Analyze financial data and trends.',
                'location' => 'Chicago, IL',
                'company_id' => 3,
                'employment_type' => 'Full-time',
                'salary' => '$70,000 - $110,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'Investment Banker',
                'description' => 'Manage investments and client portfolios.',
                'location' => 'Chicago, IL',
                'company_id' => 3,
                'employment_type' => 'Full-time',
                'salary' => '$100,000 - $150,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '18:00:00',
            ],
            [
                'title' => 'Risk Manager',
                'description' => 'Assess and mitigate financial risks.',
                'location' => 'Chicago, IL',
                'company_id' => 3,
                'employment_type' => 'Contract',
                'salary' => '$80,000 - $120,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            // Company 4: EduLearn
            [
                'title' => 'Teacher',
                'description' => 'Educate students in various subjects.',
                'location' => 'Boston, MA',
                'company_id' => 4,
                'employment_type' => 'Full-time',
                'salary' => '$50,000 - $80,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
            ],
            [
                'title' => 'Curriculum Developer',
                'description' => 'Design educational programs.',
                'location' => 'Boston, MA',
                'company_id' => 4,
                'employment_type' => 'Full-time',
                'salary' => '$60,000 - $90,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'Online Instructor',
                'description' => 'Teach courses online.',
                'location' => 'Boston, MA',
                'company_id' => 4,
                'employment_type' => 'Part-time',
                'salary' => '$40,000 - $70,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '10:00:00',
                'end_time' => '14:00:00',
            ],
            // Company 5: MarketMasters
            [
                'title' => 'Digital Marketer',
                'description' => 'Manage online marketing campaigns.',
                'location' => 'Los Angeles, CA',
                'company_id' => 5,
                'employment_type' => 'Full-time',
                'salary' => '$55,000 - $85,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'Content Creator',
                'description' => 'Create engaging content for brands.',
                'location' => 'Los Angeles, CA',
                'company_id' => 5,
                'employment_type' => 'Full-time',
                'salary' => '$45,000 - $75,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'SEO Specialist',
                'description' => 'Optimize websites for search engines.',
                'location' => 'Los Angeles, CA',
                'company_id' => 5,
                'employment_type' => 'Contract',
                'salary' => '$50,000 - $80,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            // Company 6: DesignStudio
            [
                'title' => 'Graphic Designer',
                'description' => 'Create visual content for clients.',
                'location' => 'Austin, TX',
                'company_id' => 6,
                'employment_type' => 'Full-time',
                'salary' => '$50,000 - $80,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'UX/UI Designer',
                'description' => 'Design user interfaces and experiences.',
                'location' => 'Austin, TX',
                'company_id' => 6,
                'employment_type' => 'Full-time',
                'salary' => '$60,000 - $90,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'Art Director',
                'description' => 'Lead creative projects.',
                'location' => 'Austin, TX',
                'company_id' => 6,
                'employment_type' => 'Full-time',
                'salary' => '$70,000 - $100,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            // Company 7: GreenEnergy
            [
                'title' => 'Energy Engineer',
                'description' => 'Develop renewable energy solutions.',
                'location' => 'Denver, CO',
                'company_id' => 7,
                'employment_type' => 'Full-time',
                'salary' => '$75,000 - $110,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
            ],
            [
                'title' => 'Sustainability Consultant',
                'description' => 'Advise on environmental practices.',
                'location' => 'Denver, CO',
                'company_id' => 7,
                'employment_type' => 'Contract',
                'salary' => '$60,000 - $90,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
            [
                'title' => 'Project Manager',
                'description' => 'Oversee energy projects.',
                'location' => 'Denver, CO',
                'company_id' => 7,
                'employment_type' => 'Full-time',
                'salary' => '$80,000 - $120,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
            ],
            // Company 8: RetailWorld
            [
                'title' => 'Store Manager',
                'description' => 'Manage retail store operations.',
                'location' => 'Miami, FL',
                'company_id' => 8,
                'employment_type' => 'Full-time',
                'salary' => '$45,000 - $70,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '21:00:00',
            ],
            [
                'title' => 'Sales Associate',
                'description' => 'Assist customers in purchasing.',
                'location' => 'Miami, FL',
                'company_id' => 8,
                'employment_type' => 'Part-time',
                'salary' => '$25,000 - $40,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '10:00:00',
                'end_time' => '18:00:00',
            ],
            [
                'title' => 'Inventory Specialist',
                'description' => 'Manage stock and inventory.',
                'location' => 'Miami, FL',
                'company_id' => 8,
                'employment_type' => 'Full-time',
                'salary' => '$35,000 - $55,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
            ],
            // Company 9: LogiTrans
            [
                'title' => 'Logistics Coordinator',
                'description' => 'Coordinate supply chain activities.',
                'location' => 'Atlanta, GA',
                'company_id' => 9,
                'employment_type' => 'Full-time',
                'salary' => '$50,000 - $75,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '07:00:00',
                'end_time' => '15:00:00',
            ],
            [
                'title' => 'Truck Driver',
                'description' => 'Transport goods across regions.',
                'location' => 'Atlanta, GA',
                'company_id' => 9,
                'employment_type' => 'Full-time',
                'salary' => '$40,000 - $60,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '06:00:00',
                'end_time' => '18:00:00',
            ],
            [
                'title' => 'Warehouse Supervisor',
                'description' => 'Supervise warehouse operations.',
                'location' => 'Atlanta, GA',
                'company_id' => 9,
                'employment_type' => 'Full-time',
                'salary' => '$45,000 - $65,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
            ],
            // Company 10: FoodieDelight
            [
                'title' => 'Chef',
                'description' => 'Prepare and cook meals.',
                'location' => 'Seattle, WA',
                'company_id' => 10,
                'employment_type' => 'Full-time',
                'salary' => '$40,000 - $60,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '10:00:00',
                'end_time' => '22:00:00',
            ],
            [
                'title' => 'Waiter',
                'description' => 'Serve customers in the restaurant.',
                'location' => 'Seattle, WA',
                'company_id' => 10,
                'employment_type' => 'Part-time',
                'salary' => '$20,000 - $35,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '11:00:00',
                'end_time' => '23:00:00',
            ],
            [
                'title' => 'Catering Manager',
                'description' => 'Manage catering events.',
                'location' => 'Seattle, WA',
                'company_id' => 10,
                'employment_type' => 'Full-time',
                'salary' => '$50,000 - $75,000',
                'application_deadline' => Carbon::now()
                    ->addDays(30)
                    ->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
            ],
        ];

        foreach ($jobs as $job) {
            if (
                !Job::where('title', $job['title'])
                    ->where('company_id', $job['company_id'])
                    ->exists()
            ) {
                Job::create($job);
            } else {
                echo "Job '{$job['title']}' for Company ID '{$job['company_id']}' already exists. Skipping...\n";
            }
        }
    }
}
