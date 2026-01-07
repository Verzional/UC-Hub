<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a student user
        User::create([
            'name' => 'John Doe',
            'email' => 'student@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'student_id' => '123456',
            'phone_number' => '1234567890',
            'cohort_year' => 2023,
            'major' => 'Computer Science',
            'role' => 'student',
        ]);

        // Create an ICE user
        User::create([
            'name' => 'Jane Smith',
            'email' => 'ice@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'student_id' => '654321',
            'phone_number' => '0987654321',
            'cohort_year' => 2020,
            'major' => 'Business Administration',
            'role' => 'ice',
        ]);

        // Create an admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'student_id' => '000000',
            'phone_number' => '1111111111',
            'cohort_year' => 2019,
            'major' => 'Management',
            'role' => 'admin',
        ]);
    }
}