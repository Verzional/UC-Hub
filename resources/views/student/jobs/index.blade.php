<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Browse Jobs
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 space-y-8">

            {{-- Search Bar --}}
            <x-searchbar 
                placeholder="Search jobs by title, company, location..." 
                :action="route('student.jobs.index')"
                :value="request('search')"
                :filters="[
                    'label' => 'types',
                    'options' => [
                        'full-time' => 'Full Time',
                        'part-time' => 'Part Time',
                        'contract' => 'Contract',
                        'internship' => 'Internship',
                        'freelance' => 'Freelance'
                    ]
                ]"
                :selectedFilter="request('filter')"
            />

            {{-- ================= RECOMMENDED JOBS ================= --}}
            @if($recommendations->count() > 0)
                <div class="mb-12">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="bg-orange-100 p-3 rounded-xl">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">Recommended for You</h3>
                            <p class="text-sm text-gray-500">Based on your skills and preferences</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($recommendations as $recommendation)
                            @php
                                $job = $recommendation['job'];
                                $score = $recommendation['score'];
                            @endphp
                            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border-2 border-orange-200 hover:border-orange-400">
                                <div class="bg-gradient-to-r from-orange-500 to-orange-400 p-4">
                                    <div class="flex items-start justify-between">
                                        <div class="bg-white p-3 rounded-xl">
                                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-yellow-300 text-yellow-900">
                                            ⭐ {{ number_format($score, 1) }}% Match
                                        </span>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <h4 class="font-bold text-xl text-gray-800 mb-2">{{ $job->title }}</h4>
                                    <a href="{{ route('student.companies.show', $job->company) }}" 
                                        class="text-orange-600 hover:text-orange-700 font-semibold mb-4 inline-block transition">
                                        {{ $job->company->name }}
                                    </a>

                                    <div class="space-y-2 mb-4 text-sm text-gray-600">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>{{ $job->location }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ ucfirst($job->employment_type) }}</span>
                                        </div>
                                        @if($job->salary)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Rp {{$job->salary}}</span>
                                        </div>
                                        @endif
                                    </div>

                                    @if($job->skills->count() > 0)
                                    <div class="mb-4">
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($job->skills->take(3) as $skill)
                                                <span class="px-3 py-1 bg-orange-50 text-orange-700 rounded-full text-xs font-medium">
                                                    {{ $skill->name }}
                                                </span>
                                            @endforeach
                                            @if($job->skills->count() > 3)
                                                <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">
                                                    +{{ $job->skills->count() - 3 }} more
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                    <a href="{{ route('student.jobs.show', $job) }}"
                                        class="block w-full text-center bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition duration-300 shadow-md">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- ================= ALL AVAILABLE JOBS ================= --}}
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="bg-gray-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">All Available Jobs</h3>
                        <p class="text-sm text-gray-500">Browse all job opportunities</p>
                    </div>
                </div>

                @if($availableJobs->count() > 0)
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($availableJobs as $job)
                            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-orange-300">
                                <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-4">
                                    <div class="bg-white p-3 rounded-xl w-fit">
                                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="p-6">
                                    <h4 class="font-bold text-xl text-gray-800 mb-2">{{ $job->title }}</h4>
                                    <a href="{{ route('student.companies.show', $job->company) }}" 
                                        class="text-orange-600 hover:text-orange-700 font-semibold mb-4 inline-block transition">
                                        {{ $job->company->name }}
                                    </a>

                                    <div class="space-y-2 mb-4 text-sm text-gray-600">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>{{ $job->location }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ ucfirst($job->employment_type) }}</span>
                                        </div>
                                        @if($job->salary)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Rp {{$job->salary}}</span>
                                        </div>
                                        @endif
                                    </div>

                                    @if($job->skills->count() > 0)
                                    <div class="mb-4">
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($job->skills->take(3) as $skill)
                                                <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-medium">
                                                    {{ $skill->name }}
                                                </span>
                                            @endforeach
                                            @if($job->skills->count() > 3)
                                                <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-medium">
                                                    +{{ $job->skills->count() - 3 }} more
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif

                                    <a href="{{ route('student.jobs.show', $job) }}"
                                        class="block w-full text-center bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition duration-300 shadow-md">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white rounded-2xl shadow p-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg">No jobs available at the moment</p>
                        <p class="text-gray-400 text-sm mt-2">Check back later for new opportunities</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
