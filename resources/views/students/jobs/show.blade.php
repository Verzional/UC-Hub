<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Job Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-lg font-medium">{{ $job->title }}</h3>
                        <div>
                            <a
                                href="{{ route('students.jobs.index') }}"
                                class="rounded bg-gray-500 px-4 py-2 font-bold text-white hover:bg-gray-700"
                            >
                                Back to Jobs
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <h4 class="font-semibold text-gray-700">Title</h4>
                            <p class="text-gray-900">{{ $job->title }}</p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">Company</h4>
                            <p class="text-gray-900">
                                {{ $job->company->name }}
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">
                                Location
                            </h4>
                            <p class="text-gray-900">
                                {{ $job->location ?? 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">
                                Employment Type
                            </h4>
                            <p class="text-gray-900">
                                {{ $job->employment_type ?? 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">Salary</h4>
                            <p class="text-gray-900">
                                {{ $job->salary ? '$' . number_format($job->salary) : 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">
                                Application Deadline
                            </h4>
                            <p class="text-gray-900">
                                {{ $job->application_deadline ? $job->application_deadline->format('M d, Y') : 'N/A' }}
                            </p>
                        </div>

                        <div class="md:col-span-2">
                            <h4 class="font-semibold text-gray-700">
                                Description
                            </h4>
                            <p class="text-gray-900">
                                {{ $job->description ?? 'No description available.' }}
                            </p>
                        </div>

                        <div class="md:col-span-2">
                            <h4 class="font-semibold text-gray-700">Required Skills</h4>
                            @if ($job->skills->isNotEmpty())
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($job->skills as $skill)
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">
                                            {{ $skill->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-900">No skills specified.</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Apply for Job
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>