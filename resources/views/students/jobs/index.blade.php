<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            My Jobs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-8">
            <!-- Recommended Jobs -->
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Recommended Jobs for You</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($recommendedJobs as $recommendation)
                        <div class="bg-gray-50 shadow-md rounded-lg overflow-hidden">
                            <div class="p-6">
                                <h4 class="text-xl font-semibold mb-2">{{ $recommendation['job']->title }}</h4>
                                <p class="text-gray-600 mb-2">{{ $recommendation['job']->company->name }}</p>
                                <p class="text-sm text-gray-500 mb-4">{{ $recommendation['job']->description }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-700">Match Score: {{ $recommendation['score'] }}%</span>
                                    <a href="{{ route('students.jobs.show', $recommendation['job']) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($recommendedJobs->isEmpty())
                        <p class="text-center text-gray-500">No recommended jobs at the moment.</p>
                    @endif
                </div>
            </div>

            <!-- Available Jobs -->
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Available Jobs</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($availableJobs as $job)
                        <div class="bg-white shadow-md rounded-lg overflow-hidden border">
                            <div class="p-6">
                                <h4 class="text-xl font-semibold mb-2">{{ $job->title }}</h4>
                                <p class="text-gray-600 mb-2">{{ $job->company->name }}</p>
                                <p class="text-sm text-gray-500 mb-4">{{ $job->description }}</p>
                                <div class="flex justify-end">
                                    <a href="{{ route('students.jobs.show', $job) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($availableJobs->isEmpty())
                        <p class="text-center text-gray-500">No jobs available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>