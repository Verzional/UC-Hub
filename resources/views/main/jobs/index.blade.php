<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Jobs Management
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 space-y-6">

            {{-- Header with Add Button --}}
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="bg-orange-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">Jobs List</h3>
                        <p class="text-sm text-gray-500">Manage job postings</p>
                    </div>
                </div>
                <a
                    href="{{ route('jobs.create') }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-xl transition duration-300 shadow-md flex items-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Job
                </a>
            </div>

            {{-- Search Bar --}}
            <x-searchbar 
                placeholder="Search jobs by title, company, location..." 
                :action="route('jobs.index')"
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

            {{-- Success Message --}}
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-xl shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-green-700 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            {{-- Jobs Grid --}}
            @if ($jobs->isEmpty())
                <div class="bg-white rounded-2xl shadow-md p-12 text-center">
                    <div class="bg-gray-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Jobs Found</h3>
                    <p class="text-gray-500">Get started by adding your first job posting.</p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($jobs as $job)
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="bg-gradient-to-r from-orange-500 to-orange-400 p-6">
                                <div class="bg-white p-3 rounded-xl inline-flex">
                                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="p-6">
                                <h4 class="font-bold text-xl text-gray-800 mb-2">{{ $job->title }}</h4>
                                <p class="text-orange-600 font-semibold mb-4">{{ $job->company->name }}</p>

                                <div class="space-y-2 mb-4 text-sm text-gray-600">
                                    @if($job->location)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span>{{ $job->location }}</span>
                                        </div>
                                    @endif
                                    @if($job->employment_type)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ ucfirst($job->employment_type) }}</span>
                                        </div>
                                    @endif
                                    @if($job->salary)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Rp {{ $job->salary }}</span>
                                        </div>
                                    @endif
                                    @if($job->application_deadline)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span>{{ \Carbon\Carbon::parse($job->application_deadline)->format('M d, Y') }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex gap-2 mb-4">
                                    <a href="{{ route('jobs.show', $job) }}"
                                        class="flex-1 text-center bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-lg transition duration-300">
                                        View
                                    </a>
                                    <a href="{{ route('jobs.edit', $job) }}"
                                        class="flex-1 text-center bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded-lg transition duration-300">
                                        Edit
                                    </a>
                                </div>

                                <form method="POST" action="{{ route('jobs.destroy', $job) }}" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 rounded-lg transition duration-300"
                                        onclick="return confirm('Are you sure you want to delete this job?');">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
