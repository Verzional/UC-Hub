<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Application Details
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-5xl mx-auto px-4">
            {{-- Header with Actions --}}
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">My Application</h3>
                        <p class="text-sm text-gray-500">View your application details</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('dashboard') }}"
                        class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition duration-300">
                        Back to Dashboard
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                {{-- Job Information Header --}}
                <div class="bg-gradient-to-r from-blue-500 to-blue-400 p-8">
                    <div class="flex items-center gap-6">
                        <div class="bg-white p-4 rounded-xl shadow-lg">
                            <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="text-white">
                            <h4 class="text-3xl font-bold mb-2">{{ $application->job->title }}</h4>
                            <p class="text-blue-100 text-lg">{{ $application->job->company->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    {{-- Application Status --}}
                    <div class="mb-8">
                        @php
                            $statusConfig = [
                                'pending' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'border' => 'border-blue-300'],
                                'shortlisted' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-700', 'border' => 'border-yellow-300'],
                                'accepted' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'border' => 'border-green-300'],
                                'rejected' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'border' => 'border-red-300'],
                            ];
                            $config = $statusConfig[$application->status] ?? $statusConfig['pending'];
                        @endphp
                        <div class="border-2 {{ $config['border'] }} {{ $config['bg'] }} rounded-xl p-6">
                            <div class="flex items-center gap-3">
                                <span class="px-4 py-2 rounded-full text-sm font-bold {{ $config['bg'] }} {{ $config['text'] }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                                <div>
                                    <p class="{{ $config['text'] }} font-semibold">Application Status</p>
                                    <p class="text-sm text-gray-600 mt-1">Submitted {{ $application->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Application Information Grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-blue-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Applicant</h4>
                                    <p class="text-gray-800 font-medium">{{ $application->user->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $application->user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-blue-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Applied On</h4>
                                    <p class="text-gray-800">{{ $application->created_at->format('M d, Y') }}</p>
                                    <p class="text-sm text-gray-600">{{ $application->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Cover Letter --}}
                    @if($application->cover_letter)
                        <div class="bg-gray-50 rounded-xl p-6 mb-6">
                            <h4 class="text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Cover Letter
                            </h4>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $application->cover_letter }}</p>
                        </div>
                    @endif

                    {{-- Attachments --}}
                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                            </svg>
                            Attachments
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($application->resume_path)
                                <a href="{{ asset('storage/' . $application->resume_path) }}" target="_blank" 
                                    class="flex items-center gap-3 p-4 border-2 border-blue-200 rounded-xl hover:border-blue-400 hover:bg-blue-50 transition">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Resume/CV</p>
                                        <p class="text-xs text-gray-500">Click to view or download</p>
                                    </div>
                                </a>
                            @else
                                <div class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-xl bg-gray-50">
                                    <div class="bg-gray-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-500">Resume/CV</p>
                                        <p class="text-xs text-gray-400">Not provided</p>
                                    </div>
                                </div>
                            @endif

                            @if($application->portfolio_path)
                                <a href="{{ asset('storage/' . $application->portfolio_path) }}" target="_blank"
                                    class="flex items-center gap-3 p-4 border-2 border-purple-200 rounded-xl hover:border-purple-400 hover:bg-purple-50 transition">
                                    <div class="bg-purple-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Portfolio</p>
                                        <p class="text-xs text-gray-500">Click to view or download</p>
                                    </div>
                                </a>
                            @else
                                <div class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-xl bg-gray-50">
                                    <div class="bg-gray-100 p-3 rounded-lg">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-500">Portfolio</p>
                                        <p class="text-xs text-gray-400">Not provided</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Job Details --}}
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Job Information
                        </h4>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-500">Location:</span>
                                <span class="font-medium text-gray-800 ml-2">{{ $application->job->location ?? 'N/A' }}</span>
                            </div>
                            <div>
                                <span class="text-gray-500">Employment Type:</span>
                                <span class="font-medium text-gray-800 ml-2">{{ ucfirst($application->job->employment_type ?? 'N/A') }}</span>
                            </div>
                            @if($application->job->salary)
                                <div>
                                    <span class="text-gray-500">Salary:</span>
                                    <span class="font-medium text-gray-800 ml-2">Rp {{ $application->job->salary }}</span>
                                </div>
                            @endif
                            @if($application->job->application_deadline)
                                <div>
                                    <span class="text-gray-500">Deadline:</span>
                                    <span class="font-medium text-gray-800 ml-2">{{ \Carbon\Carbon::parse($application->job->application_deadline)->format('M d, Y') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
