<?php

use App\Http\Controllers\Main\ApplicationController;
use App\Http\Controllers\Main\CompanyController;
use App\Http\Controllers\Main\ICEDashboardController;
use App\Http\Controllers\Main\JobController;
use App\Http\Controllers\Main\SkillController;
use App\Http\Controllers\Main\StudentController;
use App\Http\Controllers\Main\SurveyController;
use App\Http\Controllers\Main\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobRecommendationController;
use App\Http\Controllers\StudentRecommendationController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    $user = request()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    if ($user->role === 'ice') {
        return redirect()->route('ice.dashboard');
    }

    if ($user->role === 'student' && ! $user->survey) {
        return redirect()->route('surveys.create');
    }

    // Load applications with job and company data for students
    $applications = collect();
    if ($user->role === 'student') {
        $applications = $user->applications()
            ->with(['job.company', 'job.skills'])
            ->orderBy('created_at', 'desc')
            ->get();
    }
    
    return view('dashboard', compact('applications'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Dashboard
Route::get('/ice/dashboard', [ICEDashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'role:ice'])
    ->name('ice.dashboard');

// Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/survey', [SurveyController::class, 'create'])->name('surveys.create');
    Route::post('/survey', [SurveyController::class, 'store'])->name('surveys.store');
    Route::patch('/profile/extra', [ProfileController::class, 'updateExtra'])
        ->name('profile.update.extra');
    Route::post('/profile/skills', [ProfileController::class, 'updateSkills'])
        ->name('profile.update.skills');
});

// Resource Routes
Route::resource('/applications', ApplicationController::class)
    ->middleware(['auth', 'verified', 'role:ice']);
Route::resource('/companies', CompanyController::class)
    ->middleware(['auth', 'verified', 'role:ice']);
Route::resource('/jobs', JobController::class)
    ->middleware(['auth', 'verified', 'role:ice']);
Route::resource('/skills', SkillController::class)
    ->middleware(['auth', 'verified', 'role:ice']);
Route::resource('/students', StudentController::class, ['only' => ['index', 'show']])
    ->middleware(['auth', 'verified', 'role:ice']);
Route::resource('/surveys', SurveyController::class)
    ->middleware(['auth', 'verified']);

// Student Routes
Route::prefix('student')->name('student.')->middleware(['auth', 'verified', 'role:student'])->group(function () {
    Route::get('/jobs', [JobRecommendationController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [JobRecommendationController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{job}/apply', [JobRecommendationController::class, 'apply'])->name('jobs.apply');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('ice.dashboard');
    })->name('dashboard');
    Route::resource('users', UserController::class);
});

// Recommendation Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/jobs/{job}/recommend-students', [StudentRecommendationController::class, 'recommendForJob'])->name('recommend.students');
});

// ICE Routes Group
Route::get('/ice/dashboard', [ICEDashboardController::class, 'index'])
    ->name('ice.dashboard')
    ->middleware(['auth', 'verified', 'role:ice']);

Route::post('/ice/applications/{application}/status/{status}', [ICEDashboardController::class, 'updateApplicationStatus'])
    ->name('ice.applications.update-status')
    ->middleware(['auth', 'verified', 'role:ice']);

require __DIR__.'/auth.php';
