<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Job Details
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-5xl mx-auto px-4">

            {{-- Success/Error Messages --}}
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            {{-- Back Button --}}
            <div class="mb-6">
                <a href="{{ route('student.jobs.index') }}"
                    class="inline-flex items-center gap-2 text-orange-600 hover:text-orange-700 font-semibold transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Jobs
                </a>
            </div>

            {{-- Job Header Card --}}
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-6">
                <div class="bg-gradient-to-r from-orange-500 to-orange-400 p-8">
                    <div class="flex items-start justify-between">
                        <div class="flex gap-4">
                            <div class="bg-white p-4 rounded-2xl">
                                <svg class="w-12 h-12 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="text-white">
                                <h1 class="text-3xl font-bold mb-2">{{ $job->title }}</h1>
                                <a href="{{ route('student.companies.show', $job->company) }}" 
                                    class="text-xl font-semibold text-orange-100 hover:text-white transition-colors duration-200 inline-flex items-center gap-2 group">
                                    {{ $job->company->name }}
                                    <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    {{-- Job Quick Info --}}
                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        <div class="flex items-center gap-3">
                            <div class="bg-orange-100 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Location</p>
                                <p class="text-gray-800 font-semibold">{{ $job->location }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="bg-orange-100 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Employment Type</p>
                                <p class="text-gray-800 font-semibold">{{ ucfirst($job->employment_type) }}</p>
                            </div>
                        </div>

                        @if($job->salary)
                        <div class="flex items-center gap-3">
                            <div class="bg-orange-100 p-3 rounded-xl">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Salary</p>
                                <p class="text-gray-800 font-semibold">Rp {{ $job->salary }}</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- Skills Required --}}
                    @if($job->skills->count() > 0)
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-800 mb-3">Required Skills</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($job->skills as $skill)
                                <span class="px-4 py-2 bg-orange-50 text-orange-700 rounded-xl text-sm font-semibold border border-orange-200">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Job Description --}}
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-800 mb-3">Job Description</h3>
                        <div class="text-gray-600 leading-relaxed whitespace-pre-line">
                            {{ $job->description }}
                        </div>
                    </div>

                    {{-- Job Timeline --}}
                    <div class="grid md:grid-cols-3 gap-6 mb-8 p-6 bg-orange-50 rounded-xl">
                        @if($job->application_deadline)
                        <div>
                            <p class="text-xs text-orange-600 font-bold uppercase mb-1">Application Deadline</p>
                            <p class="text-gray-800 font-semibold">{{ \Carbon\Carbon::parse($job->application_deadline)->format('d M Y') }}</p>
                        </div>
                        @endif

                        @if($job->start_time)
                        <div>
                            <p class="text-xs text-orange-600 font-bold uppercase mb-1">Start Date</p>
                            <p class="text-gray-800 font-semibold">{{ \Carbon\Carbon::parse($job->start_time)->format('d M Y') }}</p>
                        </div>
                        @endif

                        @if($job->end_time)
                        <div>
                            <p class="text-xs text-orange-600 font-bold uppercase mb-1">End Date</p>
                            <p class="text-gray-800 font-semibold">{{ \Carbon\Carbon::parse($job->end_time)->format('d M Y') }}</p>
                        </div>
                        @endif
                    </div>

                    {{-- Apply Button --}}
                    <div class="flex gap-4">
                        @php
                            $hasApplied = auth()->user()->applications()->where('employment_id', $job->id)->exists();
                        @endphp

                        @if($hasApplied)
                            <button disabled
                                class="flex-1 bg-gray-400 text-white font-bold py-4 rounded-xl cursor-not-allowed shadow-lg">
                                Already Applied
                            </button>
                        @else
                            <button onclick="document.getElementById('applyModal').classList.remove('hidden')"
                                class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 rounded-xl transition duration-300 shadow-lg shadow-orange-200">
                                Apply Now
                            </button>
                        @endif

                        <button
                            class="px-6 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-4 rounded-xl transition duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Apply Modal --}}
            <div id="applyModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                <div class="relative top-20 mx-auto p-5 border w-11/12 max-w-2xl shadow-lg rounded-2xl bg-white">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-2xl font-bold text-gray-800">Apply for {{ $job->title }}</h3>
                        <button onclick="document.getElementById('applyModal').classList.add('hidden')"
                            class="text-gray-400 hover:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form action="{{ route('student.jobs.apply', $job) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        {{-- Cover Letter --}}
                        <div>
                            <label for="cover_letter" class="block text-sm font-bold text-gray-700 mb-2">
                                Cover Letter <span class="text-gray-400 font-normal">(Optional)</span>
                            </label>
                            <textarea id="cover_letter" name="cover_letter" rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                placeholder="Tell us why you're a great fit for this position..."></textarea>
                            @error('cover_letter')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Resume Upload --}}
                        <div>
                            <label for="resume" class="block text-sm font-bold text-gray-700 mb-2">
                                Resume <span class="text-gray-400 font-normal">(Optional - PDF, DOC, DOCX)</span>
                            </label>
                            <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            @error('resume')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Portfolio Upload --}}
                        <div>
                            <label for="portfolio" class="block text-sm font-bold text-gray-700 mb-2">
                                Portfolio <span class="text-gray-400 font-normal">(Optional - PDF, ZIP)</span>
                            </label>
                            <input type="file" id="portfolio" name="portfolio" accept=".pdf,.zip"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent">
                            @error('portfolio')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit Button --}}
                        <div class="flex gap-4">
                            <button type="button" onclick="document.getElementById('applyModal').classList.add('hidden')"
                                class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 rounded-xl transition duration-300">
                                Cancel
                            </button>
                            <button type="submit"
                                class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition duration-300 shadow-lg shadow-orange-200">
                                Submit Application
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Company Information --}}
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">About {{ $job->company->name }}</h3>
                    <a href="{{ route('student.companies.show', $job->company) }}" 
                        class="inline-flex items-center gap-2 text-orange-600 hover:text-orange-700 font-semibold transition">
                        View Company Profile
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <div class="space-y-4">
                    @if($job->company->description)
                    <div>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $job->company->description }}
                        </p>
                    </div>
                    @endif

                    <div class="grid md:grid-cols-2 gap-4 pt-4 border-t">
                        @if($job->company->website)
                        <div class="flex items-center gap-3">
                            <div class="bg-orange-100 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Website</p>
                                <a href="{{ $job->company->website }}" target="_blank" class="text-orange-600 hover:text-orange-700 font-semibold">
                                    Visit Website
                                </a>
                            </div>
                        </div>
                        @endif

                        @if($job->company->address)
                        <div class="flex items-center gap-3">
                            <div class="bg-orange-100 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Address</p>
                                <p class="text-gray-800 font-semibold">{{ $job->company->address }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
