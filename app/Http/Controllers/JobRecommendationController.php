<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Services\JobRecommendationService;
use Illuminate\Http\Request;

class JobRecommendationController extends Controller
{
    public function __construct(

        private JobRecommendationService $jobRecommendationService

    ) {}

    public function index(Request $request)
    {

        return $this->recommendForUser($request);

    }

    public function recommendForUser(Request $request)
    {

        $user = auth()->user();

        $recommendations = $this->jobRecommendationService->recommendForUser($user);

        // Build query with search and filters
        $query = Job::with(['skills', 'company']);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhereHas('company', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by employment type
        if ($request->filled('filter')) {
            $query->where('employment_type', $request->filter);
        }

        $availableJobs = $query->get();

        return view('student.jobs.index', [

            'user' => $user,

            'recommendations' => $recommendations,

            'availableJobs' => $availableJobs,

        ]);

    }

    public function show(Job $job)
    {
        // Load the necessary relationships
        $job->load(['company', 'skills']);

        return view('student.jobs.show', compact('job'));

    }

    public function apply(Request $request, Job $job)
    {
        $user = auth()->user();

        // Check if user has already applied
        $existingApplication = Application::where('user_id', $user->id)
            ->where('employment_id', $job->id)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied to this job.');
        }

        // Validate the request
        $validated = $request->validate([
            'cover_letter' => 'nullable|string|max:5000',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'portfolio' => 'nullable|file|mimes:pdf,zip|max:20480',
        ]);

        // Handle file uploads
        $resumePath = null;
        $portfolioPath = null;

        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        if ($request->hasFile('portfolio')) {
            $portfolioPath = $request->file('portfolio')->store('portfolios', 'public');
        }

        // Create the application
        Application::create([
            'user_id' => $user->id,
            'employment_id' => $job->id,
            'cover_letter' => $request->input('cover_letter'),
            'resume_path' => $resumePath,
            'portfolio_path' => $portfolioPath,
            'status' => 'pending',
        ]);

        return redirect()->route('student.jobs.show', $job)->with('success', 'Application submitted successfully!');
    }
}
