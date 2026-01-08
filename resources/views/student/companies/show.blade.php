<x-ice-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Company Details
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-5xl mx-auto px-4">
            {{-- Header with Actions --}}
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="bg-orange-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $company->name }}</h3>
                        <p class="text-sm text-gray-500">Company Profile</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('ice.dashboard') }}"
                        class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition duration-300">
                        Back
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                {{-- Landscape Profile Photo Banner --}}
                <div class="relative h-64 w-full overflow-hidden">
                    @if ($company->profile_photo_path)
                        <img src="{{ asset('storage/' . $company->profile_photo_path) }}" 
                             alt="{{ $company->name }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    @else
                        <div class="w-full h-full bg-gradient-to-r from-orange-500 to-orange-400"></div>
                    @endif
                    
                    {{-- Company Info Overlay --}}
                    <div class="absolute bottom-0 left-0 right-0 p-8">
                        <div class="flex items-center gap-6">
                            <div class="bg-white p-4 rounded-xl shadow-lg">
                                <svg class="w-16 h-16 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div class="text-white">
                                <h4 class="text-3xl font-bold mb-2">{{ $company->name }}</h4>
                                <p class="text-orange-100 text-lg">{{ $company->industry ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Website</h4>
                                    @if ($company->website)
                                        <a href="{{ $company->website }}" target="_blank" 
                                            class="text-orange-600 hover:text-orange-700 font-medium break-all">
                                            {{ $company->website }}
                                        </a>
                                    @else
                                        <p class="text-gray-600">N/A</p>
                                    @endif
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
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Address</h4>
                                    <p class="text-gray-800">{{ $company->address ?? 'N/A' }}</p>
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
                                    <p class="text-gray-800">{{ $company->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">
                            <div class="flex items-start gap-3">
                                <div class="bg-orange-100 p-2 rounded-lg">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-1">Industry</h4>
                                    <p class="text-gray-800">{{ $company->industry ?? 'N/A' }}</p>
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
                        <p class="text-gray-700 leading-relaxed">
                            {{ $company->description ?? 'No description available.' }}
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-6 mb-6">
                        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Jobs Posted
                        </h4>
                        @if ($company->jobs->isNotEmpty())
                            <div class="space-y-3">
                                @foreach ($company->jobs as $job)
                                    <div class="bg-white rounded-xl p-4 shadow-sm hover:shadow-md transition-all">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <a href="{{ route('jobs.show', $job) }}" 
                                                    class="text-lg font-semibold text-orange-600 hover:text-orange-700">
                                                    {{ $job->title }}
                                                </a>
                                                <p class="text-sm text-gray-500 mt-1">{{ $job->location ?? 'N/A' }}</p>
                                            </div>
                                            <span class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-xs font-medium">
                                                {{ ucfirst($job->employment_type ?? 'N/A') }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-center py-8">No jobs posted yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-ice-layout>
