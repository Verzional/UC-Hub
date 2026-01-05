<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create Job
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('jobs.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label
                                for="title"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Title
                            </label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                value="{{ old('title') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                required
                            />
                            @error('title')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="description"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Description
                            </label>
                            <textarea
                                name="description"
                                id="description"
                                rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                required
                            >
{{ old('description') }}</textarea
                            >
                            @error('description')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="location"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Location
                            </label>
                            <input
                                type="text"
                                name="location"
                                id="location"
                                value="{{ old('location') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            />
                            @error('location')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div
                            class="mb-4"
                            x-data="{
                                companies: @js($companies->toArray()),
                                selectedCompany: @js(old('company_id', '')),
                                searchCompany: '',
                                openCompany: false,
                                init() {
                                    if (this.selectedCompany) {
                                        const company = this.companies.find(
                                            (c) => c.id == this.selectedCompany,
                                        )
                                        if (company) {
                                            this.searchCompany = company.name
                                        }
                                    }
                                },
                            }"
                        >
                            <label
                                for="company_id"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Company
                            </label>
                            <div class="relative">
                                <input
                                    type="text"
                                    x-model="searchCompany"
                                    @focus="openCompany = true"
                                    @blur="openCompany = false"
                                    placeholder="Search and select company..."
                                    class="block w-full rounded-md border-gray-300 shadow-sm"
                                    required
                                />
                                <ul
                                    x-show="openCompany"
                                    class="absolute z-10 max-h-60 w-full overflow-y-auto rounded-md border border-gray-300 bg-white shadow-lg"
                                >
                                    <template
                                        x-for="
                                            company in
                                                companies.filter((c) =>
                                                    c.name.toLowerCase().includes(searchCompany.toLowerCase()),
                                                )
                                        "
                                        :key="company.id"
                                    >
                                        <li
                                            @mousedown.prevent="selectedCompany = company.id; searchCompany = company.name; openCompany = false"
                                            class="cursor-pointer px-4 py-2 hover:bg-gray-100"
                                            x-text="company.name"
                                        ></li>
                                    </template>
                                </ul>
                            </div>
                            <input
                                type="hidden"
                                name="company_id"
                                x-model="selectedCompany"
                            />
                            @error('company_id')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="employment_type"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Employment Type
                            </label>
                            <select
                                name="employment_type"
                                id="employment_type"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                                <option value="">Select Type</option>
                                <option
                                    value="Full-time"
                                    {{ old('employment_type') == 'Full-time' ? 'selected' : '' }}
                                >
                                    Full-time
                                </option>
                                <option
                                    value="Part-time"
                                    {{ old('employment_type') == 'Part-time' ? 'selected' : '' }}
                                >
                                    Part-time
                                </option>
                                <option
                                    value="Contract"
                                    {{ old('employment_type') == 'Contract' ? 'selected' : '' }}
                                >
                                    Contract
                                </option>
                                <option
                                    value="Internship"
                                    {{ old('employment_type') == 'Internship' ? 'selected' : '' }}
                                >
                                    Internship
                                </option>
                            </select>
                            @error('employment_type')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="salary"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Salary
                            </label>
                            <input
                                type="text"
                                name="salary"
                                id="salary"
                                value="{{ old('salary') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            />
                            @error('salary')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="application_deadline"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Application Deadline
                            </label>
                            <input
                                type="date"
                                name="application_deadline"
                                id="application_deadline"
                                value="{{ old('application_deadline') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            />
                            @error('application_deadline')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="start_time"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Start Time
                            </label>
                            <input
                                type="time"
                                name="start_time"
                                id="start_time"
                                value="{{ old('start_time') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            />
                            @error('start_time')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="end_time"
                                class="block text-sm font-medium text-gray-700"
                            >
                                End Time
                            </label>
                            <input
                                type="time"
                                name="end_time"
                                id="end_time"
                                value="{{ old('end_time') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            />
                            @error('end_time')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div
                            class="mb-4"
                            x-data="{
                                allSkills: @js($skills->toArray()),
                                skills: [''],
                                searchSkills: [''],
                                openSkills: [false],
                                updateSearchSkill(index) {
                                    if (this.skills[index]) {
                                        const skill = this.allSkills.find((s) => s.id == this.skills[index])
                                        if (skill) {
                                            this.searchSkills[index] =
                                                skill.name + ' (' + skill.industry + ')'
                                        }
                                    }
                                },
                            }"
                        >
                            <label
                                class="block text-sm font-medium text-gray-700"
                            >
                                Skills
                            </label>
                            <template
                                x-for="(skill, index) in skills"
                                :key="index"
                            >
                                <div class="mb-2">
                                    <div class="relative">
                                        <input
                                            type="text"
                                            x-model="searchSkills[index]"
                                            @focus="openSkills[index] = true"
                                            @blur="openSkills[index] = false"
                                            placeholder="Search and select skill..."
                                            class="block w-full rounded-md border-gray-300 shadow-sm"
                                        />
                                        <ul
                                            x-show="openSkills[index]"
                                            class="absolute z-10 max-h-60 w-full overflow-y-auto rounded-md border border-gray-300 bg-white shadow-lg"
                                        >
                                            <template
                                                x-for="
                                                    skillOption in
                                                        allSkills.filter((s) =>
                                                            (s.name + ' ' + s.industry)
                                                                .toLowerCase()
                                                                .includes(searchSkills[index].toLowerCase()),
                                                        )
                                                "
                                                :key="skillOption.id"
                                            >
                                                <li
                                                    @mousedown.prevent="skills[index] = skillOption.id; searchSkills[index] = skillOption.name + ' (' + skillOption.industry + ')'; openSkills[index] = false"
                                                    class="cursor-pointer px-4 py-2 hover:bg-gray-100"
                                                    x-text="skillOption.name + ' (' + skillOption.industry + ')'"
                                                ></li>
                                            </template>
                                        </ul>
                                    </div>
                                    <input
                                        type="hidden"
                                        :name="'skills[' + index + ']'"
                                        x-model="skills[index]"
                                    />
                                    <button
                                        type="button"
                                        @click="skills.splice(index, 1); searchSkills.splice(index, 1); openSkills.splice(index, 1)"
                                        x-show="skills.length > 1"
                                        class="mt-1 rounded bg-red-500 px-2 py-1 text-xs text-white hover:bg-red-700"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </template>
                            <button
                                type="button"
                                @click="skills.push(''); searchSkills.push(''); openSkills.push(false)"
                                class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-700"
                            >
                                Add Skill
                            </button>
                            @error('skills')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a
                                href="{{ route('jobs.index') }}"
                                class="mr-2 rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400"
                            >
                                Cancel
                            </a>
                            <button
                                type="submit"
                                class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
                            >
                                Create Job
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
