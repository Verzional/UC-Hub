<x-ice-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Company
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            {{-- Header --}}
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-orange-100 p-3 rounded-xl">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Create New Company</h3>
                    <p class="text-sm text-gray-500">Add a new company to the system</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <div class="p-8">
                    <form
                        method="POST"
                        action="{{ route('companies.store') }}"
                        enctype="multipart/form-data"
                    >
                        @csrf

                        <div class="mb-6">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Company Name <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                required
                            />
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Description
                            </label>
                            <textarea
                                name="description"
                                id="description"
                                rows="4"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                                Address
                            </label>
                            <input
                                type="text"
                                name="address"
                                id="address"
                                value="{{ old('address') }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            />
                            @error('address')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="website" class="block text-sm font-semibold text-gray-700 mb-2">
                                Website
                            </label>
                            <input
                                type="url"
                                name="website"
                                id="website"
                                value="{{ old('website') }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            />
                            @error('website')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="industry" class="block text-sm font-semibold text-gray-700 mb-2">
                                Industry
                            </label>
                            <select
                                name="industry"
                                id="industry"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            >
                                <option value="">Select Industry</option>
                                <option value="Information Technology" {{ old('industry') == 'Information Technology' ? 'selected' : '' }}>
                                    Information Technology
                                </option>
                                <option value="Business Management" {{ old('industry') == 'Business Management' ? 'selected' : '' }}>
                                    Business Management
                                </option>
                                <option value="Tourism" {{ old('industry') == 'Tourism' ? 'selected' : '' }}>
                                    Tourism
                                </option>
                                <option value="Creative Arts" {{ old('industry') == 'Creative Arts' ? 'selected' : '' }}>
                                    Creative Arts
                                </option>
                                <option value="Medical" {{ old('industry') == 'Medical' ? 'selected' : '' }}>
                                    Medical
                                </option>
                                <option value="Dental" {{ old('industry') == 'Dental' ? 'selected' : '' }}>
                                    Dental
                                </option>
                                <option value="Psychology" {{ old('industry') == 'Psychology' ? 'selected' : '' }}>
                                    Psychology
                                </option>
                                <option value="Communication and Media Business" {{ old('industry') == 'Communication and Media Business' ? 'selected' : '' }}>
                                    Communication and Media Business
                                </option>
                            </select>
                            @error('industry')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="profile_photo_path" class="block text-sm font-semibold text-gray-700 mb-2">
                                Profile Photo
                            </label>
                            <input
                                type="file"
                                name="profile_photo_path"
                                id="profile_photo_path"
                                accept="image/*"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            />
                            @error('profile_photo_path')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4">
                            <a
                                href="{{ route('companies.index') }}"
                                class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition duration-300"
                            >
                                Cancel
                            </a>
                            <button
                                type="submit"
                                class="px-6 py-3 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-semibold shadow-md transition duration-300"
                            >
                                Create Company
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-ice-layout>
