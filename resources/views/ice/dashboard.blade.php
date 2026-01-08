<x-ice-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                ICE Dashboard
            </h2>
            <span class="rounded-full bg-gray-100 px-4 py-1 text-sm text-gray-600">
                {{ now()->format('l, d M Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Stats Overview --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                {{-- Companies Count --}}
                <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-orange-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Companies</p>
                            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $companyCount }}</p>
                        </div>
                        <div class="bg-orange-100 p-4 rounded-xl">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Jobs Count --}}
                <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-blue-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Jobs</p>
                            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $jobCount }}</p>
                        </div>
                        <div class="bg-blue-100 p-4 rounded-xl">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Applications Count --}}
                <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Applications</p>
                            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $applicationCount }}</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-xl">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Students Count --}}
                <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-purple-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Students</p>
                            <p class="text-3xl font-bold text-gray-800 mt-1">{{ $studentCount }}</p>
                        </div>
                        <div class="bg-purple-100 p-4 rounded-xl">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabs Section --}}
            <div x-data="{ tab: '{{ $currentContext ?? 'companies' }}', openCompanyModal: false, openJobModal: false }" class="bg-white rounded-2xl shadow-md overflow-hidden">
                
                {{-- Tab Headers --}}
                <div class="border-b border-gray-200 bg-gray-50">
                    <nav class="flex space-x-8 px-6" aria-label="Tabs">
                        <button @click="tab = 'companies'"
                            :class="tab === 'companies' ? 'border-orange-500 text-orange-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                            Companies
                        </button>
                        <button @click="tab = 'jobs'"
                            :class="tab === 'jobs' ? 'border-orange-500 text-orange-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                            Jobs
                        </button>
                        <button @click="tab = 'applications'"
                            :class="tab === 'applications' ? 'border-orange-500 text-orange-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                            Applications
                        </button>
                        <button @click="tab = 'students'"
                            :class="tab === 'students' ? 'border-orange-500 text-orange-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                            Students
                        </button>
                    </nav>
                </div>

                {{-- Context-Aware Search Bar --}}
                <div class="p-6 border-b border-gray-200 bg-gray-50">
                    <form action="{{ route('ice.dashboard') }}" method="GET" class="relative" x-data="{ currentTab: tab }" x-init="$watch('tab', value => currentTab = value)">
                        <input type="hidden" name="context" :value="tab">
                        <div class="flex gap-3">
                            <div class="flex-1 relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input 
                                    type="text" 
                                    name="search" 
                                    value="{{ request('search') }}"
                                    x-bind:placeholder="
                                        tab === 'companies' ? 'Search companies by name, industry, address...' :
                                        tab === 'jobs' ? 'Search jobs by title, company, location...' :
                                        tab === 'applications' ? 'Search by student name, email, job, company...' :
                                        'Search students by name, email, major...'
                                    "
                                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200"
                                >
                            </div>
                            <button 
                                type="submit"
                                class="px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl transition duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span class="hidden md:inline">Search</span>
                            </button>
                            @if(request('search'))
                                <a 
                                    href="{{ route('ice.dashboard') }}"
                                    class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-xl transition duration-300 flex items-center justify-center gap-2"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span class="hidden md:inline">Clear</span>
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                {{-- Tab Content --}}
                <div class="p-6"

                {{-- Tab Content --}}
                <div class="p-6">
                    
                    {{-- Companies Tab --}}
                    <div x-show="tab === 'companies'" x-transition>
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-800">Manage Companies</h3>
                            <a href="{{ route('companies.create') }}"
                                class="rounded-xl bg-orange-500 px-5 py-2.5 text-white font-medium hover:bg-orange-600 transition shadow-md hover:shadow-lg">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Create Company
                                </span>
                            </a>
                        </div>

                        {{-- Top Wishlisted Companies --}}
                        @if($topSurveyCompanies->count() > 0)
                            <div class="mb-8">
                                <h4 class="text-lg font-semibold text-gray-700 mb-4 flex items-center gap-2">
                                    Top Wishlisted Companies
                                </h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($topSurveyCompanies as $wishlistData)
                                        <div class="rounded-lg bg-white p-5 shadow transition hover:shadow-lg relative">
                                            <span class="absolute top-2 right-2 bg-orange-500 text-white text-xs px-2 py-1 rounded">
                                                {{ $wishlistData->wishlist_count }} {{ Str::plural('wishlist', $wishlistData->wishlist_count) }}
                                            </span>
                                            
                                            <div class="mb-3 flex items-center gap-3">
                                                <div class="flex h-10 w-10 items-center justify-center rounded bg-orange-100 text-orange-600 font-bold">
                                                    {{ strtoupper(substr($wishlistData->company_name ?? '?', 0, 1)) }}
                                                </div>
                                                <div>
                                                    <h4 class="font-semibold text-gray-800">{{ $wishlistData->company_name }}</h4>
                                                    <p class="text-sm text-gray-500">Student Preference</p>
                                                </div>
                                            </div>

                                            <p class="mb-4 text-sm text-gray-600">
                                                This company has been wishlisted by {{ $wishlistData->wishlist_count }} {{ Str::plural('student', $wishlistData->wishlist_count) }}.
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- All Companies --}}
                        <div>
                            <h4 class="text-lg font-semibold text-gray-700 mb-4">All Companies</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @forelse($allCompanies as $company)
                                    @include('ice.partials.company-card', ['company' => $company, 'isTop' => false])
                                @empty
                                    <div class="col-span-3 text-center py-12">
                                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        <p class="text-gray-500 text-lg">No companies found</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- Jobs Tab --}}
                    <div x-show="tab === 'jobs'" x-transition>
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold text-gray-800">Manage Jobs</h3>
                            <a href="{{ route('jobs.create') }}"
                                class="rounded-xl bg-orange-500 px-5 py-2.5 text-white font-medium hover:bg-orange-600 transition shadow-md hover:shadow-lg">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Create Job
                                </span>
                            </a>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse($jobs as $job)
                                <a href="{{ route('jobs.show', $job) }}"
                                    class="block rounded-2xl bg-white p-6 shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-orange-300">
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="bg-blue-100 p-3 rounded-xl">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h4 class="font-bold text-lg text-gray-800 mb-2">{{ $job->title }}</h4>
                                    <p class="text-sm text-orange-600 font-semibold mb-3">{{ $job->company->name ?? 'No company' }}</p>
                                    <p class="text-sm text-gray-600 line-clamp-3">{{ $job->description ?? 'No description' }}</p>
                                </a>
                            @empty
                                <div class="col-span-3 text-center py-12">
                                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-gray-500 text-lg">No jobs found</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Applications Tab --}}
                    <div x-show="tab === 'applications'" x-transition>
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-gray-800">Manage Applications</h3>
                            <p class="text-sm text-gray-500 mt-1">Review and update student applications</p>
                        </div>

                        @if ($applications->isEmpty())
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-gray-500 text-lg">No applications found</p>
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach ($applications as $application)
                                    <div class="rounded-xl bg-white p-6 shadow-md hover:shadow-lg transition-all duration-300 border border-gray-200">
                                        <div class="flex items-start justify-between gap-4">
                                            {{-- Left Section: Application Details --}}
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-3">
                                                    <div class="bg-blue-100 p-2 rounded-lg">
                                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h4 class="font-bold text-gray-800">{{ $application->user->name ?? 'Unknown Applicant' }}</h4>
                                                        <p class="text-sm text-gray-500">{{ $application->user->email ?? 'No email' }}</p>
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-2 gap-3 mb-3">
                                                    <div>
                                                        <p class="text-xs text-gray-500 mb-1">Position</p>
                                                        <p class="text-sm font-semibold text-gray-800">{{ $application->job->title ?? 'N/A' }}</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs text-gray-500 mb-1">Company</p>
                                                        <p class="text-sm font-semibold text-orange-600">{{ $application->job->company->name ?? 'N/A' }}</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs text-gray-500 mb-1">Applied On</p>
                                                        <p class="text-sm text-gray-700">{{ $application->created_at->format('M d, Y') }}</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs text-gray-500 mb-1">Student ID</p>
                                                        <p class="text-sm text-gray-700">{{ $application->user->student_id ?? 'N/A' }}</p>
                                                    </div>
                                                </div>

                                                @if($application->cover_letter)
                                                    <div class="mt-3">
                                                        <p class="text-xs text-gray-500 mb-1">Cover Letter</p>
                                                        <p class="text-sm text-gray-700 line-clamp-2">{{ $application->cover_letter }}</p>
                                                    </div>
                                                @endif
                                            </div>

                                            {{-- Right Section: Status & Actions --}}
                                            <div class="flex flex-col items-end gap-3">
                                                {{-- Current Status Badge --}}
                                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                                    {{ $application->status === 'accepted' ? 'bg-green-100 text-green-700' : '' }}
                                                    {{ $application->status === 'rejected' ? 'bg-red-100 text-red-700' : '' }}
                                                    {{ $application->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}">
                                                    {{ ucfirst($application->status) }}
                                                </span>

                                                {{-- Action Buttons --}}
                                                @if($application->status === 'pending')
                                                    <div class="flex gap-2">
                                                        <form action="{{ route('ice.applications.update-status', [$application, 'accepted']) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" 
                                                                class="px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-lg hover:bg-green-600 transition flex items-center gap-1">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                                </svg>
                                                                Accept
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('ice.applications.update-status', [$application, 'rejected']) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" 
                                                                class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-lg hover:bg-red-600 transition flex items-center gap-1">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                                Reject
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <form action="{{ route('ice.applications.update-status', [$application, 'pending']) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" 
                                                            class="px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg hover:bg-gray-600 transition flex items-center gap-1">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                            </svg>
                                                            Reset to Pending
                                                        </button>
                                                    </form>
                                                @endif

                                                {{-- Document Links --}}
                                                <div class="flex gap-2 mt-2">
                                                    @if($application->resume_path)
                                                        <a href="{{ Storage::url($application->resume_path) }}" target="_blank"
                                                            class="text-xs text-blue-600 hover:underline flex items-center gap-1">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                            </svg>
                                                            Resume
                                                        </a>
                                                    @endif
                                                    @if($application->portfolio_path)
                                                        <a href="{{ Storage::url($application->portfolio_path) }}" target="_blank"
                                                            class="text-xs text-blue-600 hover:underline flex items-center gap-1">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                            </svg>
                                                            Portfolio
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- Students Tab --}}
                    <div x-show="tab === 'students'" x-transition>
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-gray-800">Students</h3>
                            <p class="text-sm text-gray-500 mt-1">View student profiles and their information</p>
                        </div>

                        @if ($students->isEmpty())
                            <div class="text-center py-12">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                <p class="text-gray-500 text-lg">No students found</p>
                            </div>
                        @else
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($students as $student)
                                    <a href="{{ route('students.show', $student) }}" class="rounded-2xl bg-white p-6 shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 hover:border-purple-300">
                                        <div class="flex items-center gap-3 mb-4">
                                            <div class="bg-purple-100 p-3 rounded-full">
                                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-800">{{ $student->name }}</h4>
                                                <p class="text-xs text-gray-500">{{ $student->email }}</p>
                                            </div>
                                        </div>

                                        <div class="space-y-2">
                                            @if($student->student_id)
                                                <div class="flex items-center gap-2 text-sm">
                                                    <span class="text-gray-500">ID:</span>
                                                    <span class="font-medium text-gray-800">{{ $student->student_id }}</span>
                                                </div>
                                            @endif
                                            @if($student->major)
                                                <div class="flex items-center gap-2 text-sm">
                                                    <span class="text-gray-500">Major:</span>
                                                    <span class="font-medium text-gray-800">{{ $student->major }}</span>
                                                </div>
                                            @endif
                                            @if($student->cgpa)
                                                <div class="flex items-center gap-2 text-sm">
                                                    <span class="text-gray-500">CGPA:</span>
                                                    <span class="font-medium text-gray-800">{{ $student->cgpa }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- Modals --}}
    <div x-data="{ openCompanyModal: false, openJobModal: false }">
        {{-- Create Company Modal --}}
        <div x-show="openCompanyModal" x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div @click.away="openCompanyModal = false"
                class="bg-white rounded-2xl w-full max-w-2xl p-8 overflow-y-auto max-h-[90vh] shadow-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Create Company</h2>
                    <button @click="openCompanyModal = false" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                @include('main.companies.create')
            </div>
        </div>

        {{-- Create Job Modal --}}
        <div x-show="openJobModal" x-cloak
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div @click.away="openJobModal = false"
                class="bg-white rounded-2xl w-full max-w-2xl p-8 overflow-y-auto max-h-[90vh] shadow-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Create Job</h2>
                    <button @click="openJobModal = false" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                @include('main.jobs.create', ['companies' => $allCompanies, 'skills' => $skills])
            </div>
        </div>
    </div>
</x-ice-layout>