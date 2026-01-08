<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Job Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">

            {{-- Action Buttons --}}
            <div class="flex justify-end space-x-2">
                <a href="{{ route('jobs.edit', $job) }}"
                   class="rounded bg-orange-500 px-4 py-2 font-bold text-white hover:bg-orange-700 transition">
                    Edit
                </a>
                <a href="{{ route('main.ice.dashboard') }}"
                   class="rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400 transition">
                    Back to Dashboard
                </a>
                <a href="{{ route('recommend.students', $job) }}"
                   class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 transition">
                    Recommend Students
                </a>
            </div>

            {{-- Job Info Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Title --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Title</h4>
                    <p class="text-gray-900">{{ $job->title }}</p>
                </div>

                {{-- Company --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Company</h4>
                    <p class="text-gray-900">{{ $job->company->name }}</p>
                </div>

                {{-- Location --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Location</h4>
                    <p class="text-gray-900">{{ $job->location ?? 'N/A' }}</p>
                </div>

                {{-- Employment Type --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Employment Type</h4>
                    <p class="text-gray-900">{{ $job->employment_type ?? 'N/A' }}</p>
                </div>

                {{-- Salary --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Salary</h4>
                    <p class="text-gray-900">{{ $job->salary ?? 'N/A' }}</p>
                </div>

                {{-- Application Deadline --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Application Deadline</h4>
                    <p class="text-gray-900">
                        {{ $job->application_deadline ? \Carbon\Carbon::parse($job->application_deadline)->format('M d, Y') : 'N/A' }}
                    </p>
                </div>

                {{-- Start Time --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Start Time</h4>
                    <p class="text-gray-900">{{ $job->start_time ?? 'N/A' }}</p>
                </div>

                {{-- End Time --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">End Time</h4>
                    <p class="text-gray-900">{{ $job->end_time ?? 'N/A' }}</p>
                </div>

                {{-- Description --}}
                <div class="bg-white rounded-lg shadow p-4 md:col-span-2">
                    <h4 class="font-semibold text-gray-700 mb-1">Description</h4>
                    <p class="text-gray-900">{{ $job->description }}</p>
                </div>

                {{-- Skills --}}
                <div class="bg-white rounded-lg shadow p-4 md:col-span-2">
                    <h4 class="font-semibold text-gray-700 mb-1">Skills</h4>
                    @if ($job->skills->isNotEmpty())
                        <ul class="list-disc list-inside text-gray-900">
                            @foreach ($job->skills as $skill)
                                <li>{{ $skill->name }} ({{ $skill->industry }})</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-900">No skills associated.</p>
                    @endif
                </div>

                {{-- Created At --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Created At</h4>
                    <p class="text-gray-900">{{ $job->created_at->format('M d, Y') }}</p>
                </div>

                {{-- Updated At --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Updated At</h4>
                    <p class="text-gray-900">{{ $job->updated_at->format('M d, Y') }}</p>
                </div>

            </div>

            {{-- Delete Job --}}
            <div class="mt-6">
                <form method="POST" action="{{ route('jobs.destroy', $job) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700 transition"
                            onclick="return confirm('Are you sure you want to delete this job?');">
                        Delete Job
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
