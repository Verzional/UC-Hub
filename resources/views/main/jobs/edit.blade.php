<x-ice-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Job
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            {{-- Header --}}
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-orange-100 p-3 rounded-xl">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">Edit Job</h3>
                    <p class="text-sm text-gray-500">Update job information</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <div class="p-8">
                    <form
                        method="POST"
                        action="{{ route('jobs.update', $job) }}"
                    >
                        @csrf
                        @method('PUT')

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
                                value="{{ old('title', $job->title) }}"
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
{{ old('description', $job->description) }}</textarea
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
                                value="{{ old('location', $job->location) }}"
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
                                selectedCompany: @js(old('company_id', $job->company_id)),
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
                                    {{ old('employment_type', $job->employment_type) == 'Full-time' ? 'selected' : '' }}
                                >
                                    Full-time
                                </option>
                                <option
                                    value="Part-time"
                                    {{ old('employment_type', $job->employment_type) == 'Part-time' ? 'selected' : '' }}
                                >
                                    Part-time
                                </option>
                                <option
                                    value="Contract"
                                    {{ old('employment_type', $job->employment_type) == 'Contract' ? 'selected' : '' }}
                                >
                                    Contract
                                </option>
                                <option
                                    value="Internship"
                                    {{ old('employment_type', $job->employment_type) == 'Internship' ? 'selected' : '' }}
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
                                value="{{ old('salary', $job->salary) }}"
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
                                value="{{ old('application_deadline', $job->application_deadline ? \Carbon\Carbon::parse($job->application_deadline)->format('Y-m-d') : '') }}"
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
                                value="{{ old('start_time', $job->start_time ? substr($job->start_time, 0, 5) : '') }}"
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
                                value="{{ old('end_time', $job->end_time ? substr($job->end_time, 0, 5) : '') }}"
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
                                skills: @json(old('skills', $job->skills->pluck('id')->toArray()) ?: ['']),
                                searchSkills: @json(array_fill(0, count(old('skills', $job->skills->pluck('id')->toArray()) ?: ['']), '')),
                                openSkills: @json(array_fill(0, count(old('skills', $job->skills->pluck('id')->toArray()) ?: ['']), false)),
                                init() {
                                    this.skills.forEach((skillId, index) => {
                                        if (skillId) {
                                            const skill = this.allSkills.find((s) => s.id == skillId)
                                            if (skill) {
                                                this.searchSkills[index] =
                                                    skill.name + ' (' + skill.industry + ')'
                                            }
                                        }
                                    })
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
                                href="{{ route('ice.dashboard') }}"
                                class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition duration-300"
                            >
                                Cancel
                            </a>
                            <button
                                type="submit"
                                class="px-6 py-3 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-semibold shadow-md transition duration-300"
                            >
                                Update Job
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-ice-layout>
