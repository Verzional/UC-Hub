<x-ice-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Job
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            {{-- Header --}}
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-orange-100 p-3 rounded-xl">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Create New Job</h3>
                    <p class="text-sm text-gray-500">Post a new job opportunity</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <div class="p-8">
                    <form method="POST" action="{{ route('jobs.store') }}">
                        @csrf

                        <div class="mb-6">
                            <label
                                for="title"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Title
                            </label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                value="{{ old('title') }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                required
                            />
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="description"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Description
                            </label>
                            <textarea
                                name="description"
                                id="description"
                                rows="4"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                required
                            >
{{ old('description') }}</textarea
                            >
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Location
                            </label>
                            <input
                                type="text"
                                name="location"
                                id="location"
                                value="{{ old('location') }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            />
                            @error('location')
                                <p class="mt-2 text-sm text-red-600">
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
                                class="block text-sm font-semibold text-gray-700 mb-2"
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
                                    class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
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
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="employment_type"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Employment Type
                            </label>
                            <select
                                name="employment_type"
                                id="employment_type"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
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
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="salary"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Salary
                            </label>
                            <input
                                type="text"
                                name="salary"
                                id="salary"
                                value="{{ old('salary') }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            />
                            @error('salary')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="application_deadline"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Application Deadline
                            </label>
                            <input
                                type="date"
                                name="application_deadline"
                                id="application_deadline"
                                value="{{ old('application_deadline') }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            />
                            @error('application_deadline')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="start_time"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                Start Time
                            </label>
                            <input
                                type="time"
                                name="start_time"
                                id="start_time"
                                value="{{ old('start_time') }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            />
                            @error('start_time')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="end_time"
                                class="block text-sm font-semibold text-gray-700 mb-2"
                            >
                                End Time
                            </label>
                            <input
                                type="time"
                                name="end_time"
                                id="end_time"
                                value="{{ old('end_time') }}"
                                class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            />
                            @error('end_time')
                                <p class="mt-2 text-sm text-red-600">
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
                                class="block text-sm font-semibold text-gray-700 mb-2"
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
                                            class="w-full rounded-xl border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
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
                                        class="mt-1 px-2 py-1 rounded-lg bg-red-500 hover:bg-red-600 text-white text-xs font-medium transition duration-300"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </template>
                            <button
                                type="button"
                                @click="skills.push(''); searchSkills.push(''); openSkills.push(false)"
                                class="px-4 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-semibold transition duration-300"
                            >
                                Add Skill
                            </button>
                            @error('skills')
                                <p class="mt-2 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4">
                            <a
                                href="{{ route('jobs.index') }}"
                                class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition duration-300"
                            >
                                Cancel
                            </a>
                            <button
                                type="submit"
                                class="px-6 py-3 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-semibold shadow-md transition duration-300"
                            >
                                Create Job
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-ice-layout>
