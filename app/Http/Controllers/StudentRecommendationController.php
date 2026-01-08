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
        $recommendations = $this->studentRecommendationService->recommendForJob($job);

        return view('main.recommendations.students', compact('job', 'recommendations'));
    }
}
