<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Job Details
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-5xl mx-auto px-4">
            {{-- Header with Actions --}}
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="bg-orange-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $job->title }}</h3>
                        <p class="text-sm text-gray-500">Job Details</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('jobs.edit', $job) }}"
                        class="px-4 py-2 rounded-xl bg-yellow-500 hover:bg-yellow-600 text-white font-semibold transition duration-300 shadow-md flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('ice.dashboard') }}"
                        class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition duration-300">
                        Back
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-orange-500 to-orange-400 p-8">
                    <div class="flex items-center gap-6">
                        <div class="bg-white p-4 rounded-xl shadow-lg">
                            <svg class="w-16 h-16 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="text-white">
                            <h4 class="text-3xl font-bold mb-2">{{ $job->title }}</h4>
                            <p class="text-orange-100 text-lg">{{ $job->company->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Company</h4>
                                    <p class="text-gray-800 font-medium">{{ $job->company->name }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Location</h4>
                                    <p class="text-gray-800">{{ $job->location ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Employment Type</h4>
                                    <p class="text-gray-800">{{ ucfirst($job->employment_type ?? 'N/A') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Salary</h4>
                                    <p class="text-gray-800">{{ $job->salary ? 'Rp ' . $job->salary : 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Application Deadline</h4>
                                    <p class="text-gray-800">{{ $job->application_deadline ? \Carbon\Carbon::parse($job->application_deadline)->format('M d, Y') : 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Working Hours</h4>
                                    <p class="text-gray-800">
                                        {{ $job->start_time ?? 'N/A' }} - {{ $job->end_time ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Created At</h4>
                                    <p class="text-gray-800">{{ $job->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Updated At</h4>
                                    <p class="text-gray-800">{{ $job->updated_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            Description
                        </h4>
                        <p class="text-gray-700 leading-relaxed">{{ $job->description }}</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                            Required Skills
                        </h4>
                        @if ($job->skills->isNotEmpty())
                            <div class="flex flex-wrap gap-2">
                                @foreach ($job->skills as $skill)
                                    <span class="px-4 py-2 bg-orange-100 text-orange-700 rounded-full text-sm font-medium">
                                        {{ $skill->name }} <span class="text-orange-500">({{ $skill->industry }})</span>
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-center py-4">No specific skills required.</p>
                        @endif
                    </div>

                    <div class="border-t pt-6">
                        <form method="POST" action="{{ route('jobs.destroy', $job) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full md:w-auto px-6 py-3 rounded-xl bg-red-500 hover:bg-red-600 text-white font-semibold shadow-md transition duration-300"
                                onclick="return confirm('Are you sure you want to delete this job? This action cannot be undone.');">
                                Delete Job
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
