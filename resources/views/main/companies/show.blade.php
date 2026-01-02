<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Company Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-lg font-medium">
                            {{ $company->name }}
                        </h3>
                        <div>
                            <a
                                href="{{ route('companies.edit', $company) }}"
                                class="mr-2 rounded bg-yellow-500 px-4 py-2 font-bold text-white hover:bg-yellow-700"
                            >
                                Edit
                            </a>
                            <a
                                href="{{ route('companies.index') }}"
                                class="rounded bg-gray-500 px-4 py-2 font-bold text-white hover:bg-gray-700"
                            >
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <h4 class="font-semibold text-gray-700">Name</h4>
                            <p class="text-gray-900">{{ $company->name }}</p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">
                                Industry
                            </h4>
                            <p class="text-gray-900">
                                {{ $company->industry ?? 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">Website</h4>
                            <p class="text-gray-900">
                                @if ($company->website)
                                    <a
                                        href="{{ $company->website }}"
                                        target="_blank"
                                        class="text-blue-600 hover:text-blue-900"
                                    >
                                        {{ $company->website }}
                                    </a>
                                @else
                                        N/A
                                @endif
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">Address</h4>
                            <p class="text-gray-900">
                                {{ $company->address ?? 'N/A' }}
                            </p>
                        </div>

                        <div class="md:col-span-2">
                            <h4 class="font-semibold text-gray-700">
                                Description
                            </h4>
                            <p class="text-gray-900">
                                {{ $company->description ?? 'No description available.' }}
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">
                                Profile Photo
                            </h4>

                            @if ($company->profile_photo_path)
                                <img
                                    src="{{ asset('storage/' . $company->profile_photo_path) }}"
                                    alt="Profile Photo"
                                    class="h-32 w-32 rounded object-cover"
                                />
                            @else
                                <p class="text-gray-900">No photo uploaded</p>
                            @endif
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">
                                Created At
                            </h4>
                            <p class="text-gray-900">
                                {{ $company->created_at->format('M d, Y') }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <form
                            method="POST"
                            action="{{ route('companies.destroy', $company) }}"
                            class="inline"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700"
                                onclick="
                                    return confirm(
                                        'Are you sure you want to delete this company?',
                                    );
                                "
                            >
                                Delete Company
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
