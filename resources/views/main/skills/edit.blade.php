<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Skill
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form
                        method="POST"
                        action="{{ route('skills.update', $skill) }}"
                    >
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label
                                for="name"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Name
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $skill->name) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                required
                            />
                            @error('name')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="industry"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Industry
                            </label>
                            <select
                                name="industry"
                                id="industry"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                                <option value="">Select Industry</option>
                                <option
                                    value="Information Technology"
                                    {{ old('industry', $skill->industry) == 'Information Technology' ? 'selected' : '' }}
                                >
                                    Information Technology
                                </option>
                                <option
                                    value="Business Management"
                                    {{ old('industry', $skill->industry) == 'Business Management' ? 'selected' : '' }}
                                >
                                    Business Management
                                </option>
                                <option
                                    value="Tourism"
                                    {{ old('industry', $skill->industry) == 'Tourism' ? 'selected' : '' }}
                                >
                                    Tourism
                                </option>
                                <option
                                    value="Creative Arts"
                                    {{ old('industry', $skill->industry) == 'Creative Arts' ? 'selected' : '' }}
                                >
                                    Creative Arts
                                </option>
                                <option
                                    value="Medical"
                                    {{ old('industry', $skill->industry) == 'Medical' ? 'selected' : '' }}
                                >
                                    Medical
                                </option>
                                <option
                                    value="Dental"
                                    {{ old('industry', $skill->industry) == 'Dental' ? 'selected' : '' }}
                                >
                                    Dental
                                </option>
                                <option
                                    value="Psychology"
                                    {{ old('industry', $skill->industry) == 'Psychology' ? 'selected' : '' }}
                                >
                                    Psychology
                                </option>
                                <option
                                    value="Communication and Media Business"
                                    {{ old('industry', $skill->industry) == 'Communication and Media Business' ? 'selected' : '' }}
                                >
                                    Communication and Media Business
                                </option>
                            </select>
                            @error('industry')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a
                                href="{{ route('skills.index') }}"
                                class="mr-2 rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400"
                            >
                                Cancel
                            </a>
                            <button
                                type="submit"
                                class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
                            >
                                Update Skill
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
