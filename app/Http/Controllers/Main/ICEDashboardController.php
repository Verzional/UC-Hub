<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Survey;
use App\Models\User;
use App\Models\Application;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ICEDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get counts
        $companyCount = Company::count();
        $jobCount = Job::count();
        $applicationCount = Application::count();
        $studentCount = User::where('role', 'Student')->count();

        // Get search and context
        $search = $request->input('search');
        $context = $request->input('context', 'companies');

        // All companies with search
        $companiesQuery = Company::query();
        if ($search) {
            $companiesQuery->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('industry', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }
        $allCompanies = $companiesQuery->get();
        
        // Get top wishlisted company names from student surveys
        $topWishlistedCompanyNames = Wishlist::select('company_name', DB::raw('count(*) as wishlist_count'))
            ->groupBy('company_name')
            ->orderBy('wishlist_count', 'desc')
            ->take(10)
            ->get();
        
        // Jobs with search
        $jobsQuery = Job::with('company')->latest();
        if ($search) {
            $jobsQuery->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhereHas('company', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }
        $jobs = $jobsQuery->get();

        // Applications with search
        $applicationsQuery = Application::with(['user', 'job.company'])->latest();
        if ($search) {
            $applicationsQuery->where(function($q) use ($search) {
                $q->whereHas('user', function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('student_id', 'like', "%{$search}%");
                })
                ->orWhereHas('job', function($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                })
                ->orWhereHas('job.company', function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
            });
        }
        $applications = $applicationsQuery->get();

        // Students with search
        $studentsQuery = User::where('role', 'Student');
        if ($search) {
            $studentsQuery->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('student_id', 'like', "%{$search}%")
                  ->orWhere('major', 'like', "%{$search}%");
            });
        }
        $students = $studentsQuery->get();
        
        $surveys = Survey::with(['user', 'wishlists'])->get();
        $skills = Skill::all();

        return view('ice.dashboard', [
            'companyCount' => $companyCount,
            'jobCount' => $jobCount,
            'applicationCount' => $applicationCount,
            'studentCount' => $studentCount,
            'allCompanies' => $allCompanies,
            'topSurveyCompanies' => $topWishlistedCompanyNames,
            'jobs' => $jobs,
            'surveys' => $surveys,
            'applications' => $applications,
            'students' => $students,
            'skills' => $skills,
            'currentContext' => $context,
        ]);
    }

    public function updateApplicationStatus(Application $application, $status)
    {
        $application->update(['status' => $status]);
        
        return redirect()->back()->with('success', 'Application status updated successfully!');
    }
}