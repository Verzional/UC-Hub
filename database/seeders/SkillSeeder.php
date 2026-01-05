<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'Programming', 'industry' => 'Technology'],
            ['name' => 'Web Development', 'industry' => 'Technology'],
            ['name' => 'Data Analysis', 'industry' => 'Technology'],
            ['name' => 'Machine Learning', 'industry' => 'Technology'],
            ['name' => 'Cybersecurity', 'industry' => 'Technology'],
            ['name' => 'Cloud Computing', 'industry' => 'Technology'],
            ['name' => 'DevOps', 'industry' => 'Technology'],
            ['name' => 'Mobile App Development', 'industry' => 'Technology'],
            ['name' => 'Database Management', 'industry' => 'Technology'],
            ['name' => 'Software Testing', 'industry' => 'Technology'],
            ['name' => 'Nursing', 'industry' => 'Healthcare'],
            ['name' => 'Surgery', 'industry' => 'Healthcare'],
            ['name' => 'Pharmacy', 'industry' => 'Healthcare'],
            ['name' => 'Radiology', 'industry' => 'Healthcare'],
            ['name' => 'Physical Therapy', 'industry' => 'Healthcare'],
            ['name' => 'Mental Health Counseling', 'industry' => 'Healthcare'],
            ['name' => 'Emergency Medicine', 'industry' => 'Healthcare'],
            ['name' => 'Pediatrics', 'industry' => 'Healthcare'],
            ['name' => 'Cardiology', 'industry' => 'Healthcare'],
            ['name' => 'Oncology', 'industry' => 'Healthcare'],
            ['name' => 'Accounting', 'industry' => 'Finance'],
            ['name' => 'Investment Banking', 'industry' => 'Finance'],
            ['name' => 'Financial Analysis', 'industry' => 'Finance'],
            ['name' => 'Risk Management', 'industry' => 'Finance'],
            ['name' => 'Taxation', 'industry' => 'Finance'],
            ['name' => 'Auditing', 'industry' => 'Finance'],
            ['name' => 'Corporate Finance', 'industry' => 'Finance'],
            ['name' => 'Portfolio Management', 'industry' => 'Finance'],
            ['name' => 'Insurance', 'industry' => 'Finance'],
            ['name' => 'Cryptocurrency Trading', 'industry' => 'Finance'],
            ['name' => 'Teaching', 'industry' => 'Education'],
            ['name' => 'Curriculum Development', 'industry' => 'Education'],
            ['name' => 'Educational Administration', 'industry' => 'Education'],
            ['name' => 'Special Education', 'industry' => 'Education'],
            ['name' => 'Online Learning', 'industry' => 'Education'],
            ['name' => 'Language Instruction', 'industry' => 'Education'],
            ['name' => 'STEM Education', 'industry' => 'Education'],
            ['name' => 'Counseling', 'industry' => 'Education'],
            ['name' => 'Research', 'industry' => 'Education'],
            ['name' => 'Student Assessment', 'industry' => 'Education'],
            ['name' => 'Digital Marketing', 'industry' => 'Marketing'],
            ['name' => 'Content Creation', 'industry' => 'Marketing'],
            ['name' => 'SEO', 'industry' => 'Marketing'],
            ['name' => 'Social Media Management', 'industry' => 'Marketing'],
            ['name' => 'Brand Management', 'industry' => 'Marketing'],
            ['name' => 'Public Relations', 'industry' => 'Marketing'],
            ['name' => 'Advertising', 'industry' => 'Marketing'],
            ['name' => 'Market Research', 'industry' => 'Marketing'],
            ['name' => 'Event Planning', 'industry' => 'Marketing'],
            ['name' => 'Copywriting', 'industry' => 'Marketing'],
            ['name' => 'Graphic Design', 'industry' => 'Design'],
            ['name' => 'UX/UI Design', 'industry' => 'Design'],
        ];

        foreach ($skills as $skill) {
            if (!Skill::where('name', $skill['name'])->exists()) {
                Skill::create($skill);
            } else {
                echo "Skill '{$skill['name']}' already exists. Skipping...\n";
            }
        }
    }
}
