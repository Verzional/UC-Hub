<div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-lg bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold text-orange-600 mb-6 text-center">
            Create Company
        </h2>

        <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>
                @error('description') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('address') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                <input type="url" name="website" id="website" value="{{ old('website') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('website') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="industry" class="block text-sm font-medium text-gray-700">Industry</label>
                <select name="industry" id="industry"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="">Select Industry</option>
                    <option value="Information Technology" {{ old('industry') == 'Information Technology' ? 'selected' : '' }}>Information Technology</option>
                    <option value="Business Management" {{ old('industry') == 'Business Management' ? 'selected' : '' }}>Business Management</option>
                    <option value="Tourism" {{ old('industry') == 'Tourism' ? 'selected' : '' }}>Tourism</option>
                    <option value="Creative Arts" {{ old('industry') == 'Creative Arts' ? 'selected' : '' }}>Creative Arts</option>
                    <option value="Medical" {{ old('industry') == 'Medical' ? 'selected' : '' }}>Medical</option>
                    <option value="Dental" {{ old('industry') == 'Dental' ? 'selected' : '' }}>Dental</option>
                    <option value="Psychology" {{ old('industry') == 'Psychology' ? 'selected' : '' }}>Psychology</option>
                    <option value="Communication and Media Business" {{ old('industry') == 'Communication and Media Business' ? 'selected' : '' }}>Communication and Media Business</option>
                </select>
                @error('industry') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="profile_photo_path" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                <input type="file" name="profile_photo_path" id="profile_photo_path" accept="image/*"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('profile_photo_path') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('main.ice.dashboard') }}"
                   class="rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400">Cancel</a>
                <button type="submit"
                        class="rounded bg-orange-500 px-4 py-2 font-bold text-white hover:bg-orange-700">
                    Create Company
                </button>
            </div>
        </form>
    </div>
</div>
