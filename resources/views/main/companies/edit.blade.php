<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Company
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $company->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $company->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" name="address" id="address" value="{{ old('address', $company->address) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('address')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                            <input type="url" name="website" id="website" value="{{ old('website', $company->website) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('website')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                            <select
                                name="industry"
                                id="industry"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                                <option value="">Select Industry</option>
                                <option
                                    value="Information Technology"
                                    {{ old('industry') == 'Information Technology' ? 'selected' : '' }}
                                >
                                    Information Technology
                                </option>
                                <option
                                    value="Business Management"
                                    {{ old('industry') == 'Business Management' ? 'selected' : '' }}
                                >
                                    Business Management
                                </option>
                                <option
                                    value="Tourism"
                                    {{ old('industry') == 'Tourism' ? 'selected' : '' }}
                                >
                                    Tourism
                                </option>
                                <option
                                    value="Creative Arts"
                                    {{ old('industry') == 'Creative Arts' ? 'selected' : '' }}
                                >
                                    Creative Arts
                                </option>
                                <option
                                    value="Medical"
                                    {{ old('industry') == 'Medical' ? 'selected' : '' }}
                                >
                                    Medical
                                </option>
                                <option
                                    value="Dental"
                                    {{ old('industry') == 'Dental' ? 'selected' : '' }}
                                >
                                    Dental
                                </option>
                                <option
                                    value="Psychology"
                                    {{ old('industry') == 'Psychology' ? 'selected' : '' }} 
                                >
                                    Psychology
                                </option>
                                <option
                                    value="Communication and Media Business"
                                    {{ old('industry') == 'Communicationa and Media Business' ? 'selected' : '' }} 
                                >
                                    Communication and Media Business
                                </option>
                            </select>
                            @error('industry')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="profile_photo_path" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                            @if($company->profile_photo_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $company->profile_photo_path) }}" alt="Current Photo" class="w-20 h-20 object-cover rounded">
                                    <p class="text-sm text-gray-600">Current photo</p>
                                </div>
                            @endif
                            <input type="file" name="profile_photo_path" id="profile_photo_path" accept="image/*" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <p class="text-sm text-gray-500">Leave empty to keep current photo</p>
                            @error('profile_photo_path')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('companies.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                Cancel
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Company
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
