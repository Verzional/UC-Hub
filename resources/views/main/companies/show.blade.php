<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Company Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">

            {{-- Action Buttons --}}
            <div class="flex justify-end space-x-2">
                <a href="{{ route('companies.edit', $company) }}"
                   class="rounded bg-orange-500 px-4 py-2 font-bold text-white hover:bg-orange-700 transition">
                    Edit
                </a>
                <a href="{{ route('main.ice.dashboard') }}"
                   class="rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400 transition">
                    Back to Dashboard
                </a>
            </div>

            {{-- Company Info Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Name --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Name</h4>
                    <p class="text-gray-900">{{ $company->name }}</p>
                </div>

                {{-- Industry --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Industry</h4>
                    <p class="text-gray-900">{{ $company->industry ?? 'N/A' }}</p>
                </div>

                {{-- Website --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Website</h4>
                    <p class="text-gray-900">
                        @if ($company->website)
                            <a href="{{ $company->website }}" target="_blank" class="text-blue-600 hover:text-blue-900">
                                {{ $company->website }}
                            </a>
                        @else
                            N/A
                        @endif
                    </p>
                </div>

                {{-- Address --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Address</h4>
                    <p class="text-gray-900">{{ $company->address ?? 'N/A' }}</p>
                </div>

                {{-- Description --}}
                <div class="bg-white rounded-lg shadow p-4 md:col-span-2">
                    <h4 class="font-semibold text-gray-700 mb-1">Description</h4>
                    <p class="text-gray-900">{{ $company->description ?? 'No description available.' }}</p>
                </div>

                {{-- Jobs --}}
                <div class="bg-white rounded-lg shadow p-4 md:col-span-2">
                    <h4 class="font-semibold text-gray-700 mb-1">Jobs</h4>
                    @if ($company->jobs->isNotEmpty())
                        <ul class="list-disc list-inside text-gray-900">
                            @foreach ($company->jobs as $job)
                                <li>
                                    <a href="{{ route('jobs.show', $job) }}"
                                       class="text-blue-600 hover:text-blue-900">
                                        {{ $job->title }}
                                    </a>
                                    - {{ $job->location ?? 'N/A' }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-900">No jobs posted.</p>
                    @endif
                </div>

                {{-- Profile Photo --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Profile Photo</h4>
                    @if ($company->profile_photo_path)
                        <img src="{{ asset('storage/' . $company->profile_photo_path) }}"
                             alt="Profile Photo"
                             class="h-32 w-32 rounded object-cover">
                    @else
                        <p class="text-gray-900">No photo uploaded</p>
                    @endif
                </div>

                {{-- Created At --}}
                <div class="bg-white rounded-lg shadow p-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Created At</h4>
                    <p class="text-gray-900">{{ $company->created_at->format('M d, Y') }}</p>
                </div>

            </div>

            {{-- Delete Company --}}
            <div class="mt-6">
                <form method="POST" action="{{ route('companies.destroy', $company) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700 transition"
                            onclick="return confirm('Are you sure you want to delete this company?');">
                        Delete Company
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
