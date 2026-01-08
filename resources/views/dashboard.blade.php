<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Dashboard
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 space-y-8">

            {{-- ================= APPLICATION STATS ================= --}}
            <div class="grid md:grid-cols-4 gap-4">
                @php
                    $stats = [
                        'total' => $applications->count(),
                        'pending' => $applications->where('status', 'pending')->count(),
                        'shortlisted' => $applications->where('status', 'shortlisted')->count(),
                        'accepted' => $applications->where('status', 'accepted')->count(),
                        'rejected' => $applications->where('status', 'rejected')->count(),
                    ];
                @endphp

                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Applications</p>
                            <p class="text-3xl font-bold text-gray-800">{{ $stats['total'] }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Pending</p>
                            <p class="text-3xl font-bold text-blue-600">{{ $stats['pending'] }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Shortlisted</p>
                            <p class="text-3xl font-bold text-yellow-600">{{ $stats['shortlisted'] }}</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Accepted</p>
                            <p class="text-3xl font-bold text-green-600">{{ $stats['accepted'] }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ================= APPLICATION STATUS ================= --}}
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">My Applications</h3>

                @if($applications->count() > 0)
                    <div class="space-y-4">
                        @foreach($applications as $application)
                            @php
                                $statusColors = [
                                    'pending' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'label' => 'Pending'],
                                    'shortlisted' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-700', 'label' => 'Shortlisted'],
                                    'accepted' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'label' => 'Accepted'],
                                    'rejected' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'label' => 'Rejected'],
                                ];
                                $color = $statusColors[$application->status] ?? $statusColors['pending'];

                                $statusMessages = [
                                    'pending' => 'Application submitted successfully and is currently being reviewed by the ICE team.',
                                    'shortlisted' => 'Congratulations! Your application has passed ICE verification and has been forwarded to the company.',
                                    'accepted' => 'Excellent news! Your application has been accepted by the company. Check your email or contact ICE for next steps.',
                                    'rejected' => 'Unfortunately, your application was not selected at this time. Keep applying to other opportunities!',
                                ];
                            @endphp

                            <a href="{{ route('student.applications.show', $application) }}" class="block border rounded-xl p-4 hover:border-orange-400 hover:bg-orange-50 transition cursor-pointer">
                                <div class="flex-1">
                                    <div class="flex items-start justify-between mb-2">
                                        <h4 class="font-medium text-gray-800">
                                            {{ $application->job->title }} – {{ $application->job->company->name }}
                                        </h4>
                                        <span class="px-3 py-1 rounded-full text-xs {{ $color['bg'] }} {{ $color['text'] }} font-semibold ml-4">
                                            {{ $color['label'] }}
                                        </span>
                                    </div>
                                    
                                    <p class="text-sm text-gray-500 mb-2">
                                        {{ $statusMessages[$application->status] }}
                                    </p>

                                    <div class="flex items-center gap-4 text-xs text-gray-400">
                                        <span>📍 {{ $application->job->location }}</span>
                                        <span>📅 Applied {{ $application->created_at->diffForHumans() }}</span>
                                        @if($application->job->application_deadline)
                                            <span>⏰ Deadline: {{ \Carbon\Carbon::parse($application->job->application_deadline)->format('M d, Y') }}</span>
                                        @endif
                                    </div>

                                    @if($application->job->skills->count() > 0)
                                        <div class="flex flex-wrap gap-2 mt-3">
                                            @foreach($application->job->skills->take(4) as $skill)
                                                <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-md text-xs">
                                                    {{ $skill->name }}
                                                </span>
                                            @endforeach
                                            @if($application->job->skills->count() > 4)
                                                <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded-md text-xs">
                                                    +{{ $application->job->skills->count() - 4 }} more
                                                </span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg mb-2">No applications yet</p>
                        <p class="text-gray-400 text-sm mb-4">Start applying to jobs that match your skills and interests</p>
                        <a href="{{ route('student.jobs.index') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-full text-sm font-medium">
                            Browse Jobs
                        </a>
                    </div>
                @endif
            </div>

            {{-- ================= QUICK ACTIONS ================= --}}
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>

                <div class="grid md:grid-cols-2 gap-4">
                    <a href="{{ route('student.jobs.index') }}" class="flex items-center gap-3 p-4 border rounded-xl hover:border-orange-400 hover:bg-orange-50 transition">
                        <div class="bg-orange-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Browse Jobs</p>
                            <p class="text-sm text-gray-500">Find new opportunities</p>
                        </div>
                    </a>

                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 p-4 border rounded-xl hover:border-orange-400 hover:bg-orange-50 transition">
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Update Profile</p>
                            <p class="text-sm text-gray-500">Keep your info current</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
