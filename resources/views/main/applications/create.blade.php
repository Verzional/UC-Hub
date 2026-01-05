<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Create Application
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form
                        method="POST"
                        action="{{ route('applications.store') }}"
                    >
                        @csrf

                        <div
                            class="mb-4"
                            x-data="{
                                users: @js($users->toArray()),
                                selectedUser: @js(old('user_id', '')),
                                searchUser: '',
                                openUser: false,
                                init() {
                                    if (this.selectedUser) {
                                        const user = this.users.find((u) => u.id == this.selectedUser)
                                        if (user) {
                                            this.searchUser = user.name
                                        }
                                    }
                                },
                            }"
                        >
                            <label
                                for="user_id"
                                class="block text-sm font-medium text-gray-700"
                            >
                                User
                            </label>
                            <div class="relative">
                                <input
                                    type="text"
                                    x-model="searchUser"
                                    @focus="openUser = true"
                                    @blur="openUser = false"
                                    placeholder="Search and select user..."
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                    required
                                />
                                <ul
                                    x-show="openUser"
                                    class="absolute z-10 max-h-60 w-full overflow-y-auto rounded-md border border-gray-300 bg-white shadow-lg"
                                >
                                    <template
                                        x-for="
                                            user in
                                                users.filter((u) => u.name.toLowerCase().includes(searchUser.toLowerCase()))
                                        "
                                        :key="user.id"
                                    >
                                        <li
                                            @mousedown.prevent="selectedUser = user.id; searchUser = user.name; openUser = false"
                                            class="cursor-pointer px-4 py-2 hover:bg-gray-100"
                                            x-text="user.name"
                                        ></li>
                                    </template>
                                </ul>
                            </div>
                            <input
                                type="hidden"
                                name="user_id"
                                x-model="selectedUser"
                            />
                            @error('user_id')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div
                            class="mb-4"
                            x-data="{
                                jobs: @js($jobs->toArray()),
                                selectedJob: @js(old('job_id', '')),
                                searchJob: '',
                                openJob: false,
                                init() {
                                    if (this.selectedJob) {
                                        const job = this.jobs.find((j) => j.id == this.selectedJob)
                                        if (job) {
                                            this.searchJob = job.title
                                        }
                                    }
                                },
                            }"
                        >
                            <label
                                for="job_id"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Job
                            </label>
                            <div class="relative">
                                <input
                                    type="text"
                                    x-model="searchJob"
                                    @focus="openJob = true"
                                    @blur="openJob = false"
                                    placeholder="Search and select job..."
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                    required
                                />
                                <ul
                                    x-show="openJob"
                                    class="absolute z-10 max-h-60 w-full overflow-y-auto rounded-md border border-gray-300 bg-white shadow-lg"
                                >
                                    <template
                                        x-for="
                                            job in
                                                jobs.filter((j) => j.title.toLowerCase().includes(searchJob.toLowerCase()))
                                        "
                                        :key="job.id"
                                    >
                                        <li
                                            @mousedown.prevent="selectedJob = job.id; searchJob = job.title; openJob = false"
                                            class="cursor-pointer px-4 py-2 hover:bg-gray-100"
                                            x-text="job.title"
                                        ></li>
                                    </template>
                                </ul>
                            </div>
                            <input
                                type="hidden"
                                name="job_id"
                                x-model="selectedJob"
                            />
                            @error('job_id')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="cover_letter"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Cover Letter
                            </label>
                            <textarea
                                name="cover_letter"
                                id="cover_letter"
                                rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
{{ old('cover_letter') }}</textarea
                            >
                            @error('cover_letter')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="resume_path"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Resume Path
                            </label>
                            <input
                                type="text"
                                name="resume_path"
                                id="resume_path"
                                value="{{ old('resume_path') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            />
                            @error('resume_path')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="portfolio_path"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Portfolio Path
                            </label>
                            <input
                                type="text"
                                name="portfolio_path"
                                id="portfolio_path"
                                value="{{ old('portfolio_path') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            />
                            @error('portfolio_path')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label
                                for="status"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Status
                            </label>
                            <select
                                name="status"
                                id="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            >
                                <option value="">Select Status</option>
                                <option
                                    value="pending"
                                    {{ old('status') == 'pending' ? 'selected' : '' }}
                                >
                                    Pending
                                </option>
                                <option
                                    value="approved"
                                    {{ old('status') == 'approved' ? 'selected' : '' }}
                                >
                                    Approved
                                </option>
                                <option
                                    value="rejected"
                                    {{ old('status') == 'rejected' ? 'selected' : '' }}
                                >
                                    Rejected
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-xs text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a
                                href="{{ route('applications.index') }}"
                                class="mr-2 rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400"
                            >
                                Cancel
                            </a>
                            <button
                                type="submit"
                                class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700"
                            >
                                Create Application
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
