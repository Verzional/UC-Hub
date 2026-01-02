<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Company Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium">{{ $company->name }}</h3>
                        <div>
                            <a href="{{ route('companies.edit', $company) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Edit
                            </a>
                            <a href="{{ route('companies.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Back to List
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-gray-700">Name</h4>
                            <p class="text-gray-900">{{ $company->name }}</p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">Industry</h4>
                            <p class="text-gray-900">{{ $company->industry ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">Website</h4>
                            <p class="text-gray-900">
                                @if($company->website)
                                    <a href="{{ $company->website }}" target="_blank" class="text-blue-600 hover:text-blue-900">{{ $company->website }}</a>
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">Address</h4>
                            <p class="text-gray-900">{{ $company->address ?? 'N/A' }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <h4 class="font-semibold text-gray-700">Description</h4>
                            <p class="text-gray-900">{{ $company->description ?? 'No description available.' }}</p>
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">Profile Photo</h4>
                            @if($company->profile_photo_path)
                                <img src="{{ asset('storage/' . $company->profile_photo_path) }}" alt="Profile Photo" class="w-32 h-32 object-cover rounded">
                            @else
                                <p class="text-gray-900">No photo uploaded</p>
                            @endif
                        </div>

                        <div>
                            <h4 class="font-semibold text-gray-700">Created At</h4>
                            <p class="text-gray-900">{{ $company->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <form method="POST" action="{{ route('companies.destroy', $company) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this company?')">
                                Delete Company
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
