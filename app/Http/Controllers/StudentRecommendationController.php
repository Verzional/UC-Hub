<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Services\StudentRecommendationService;

class StudentRecommendationController extends Controller
{
    public function __construct(

        private StudentRecommendationService $studentRecommendationService

    ) {}

    public function recommendForJob(Job $job)
    {
        // Recommendations are now displayed directly on the job show page
        return redirect()->route('jobs.show', $job);
    }
}
