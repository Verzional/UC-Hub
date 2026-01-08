<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Companies Management
        </h2>
    </x-slot>

    <div class="py-10 bg-[#FFF6EE] min-h-screen">
        <div class="max-w-7xl mx-auto px-4 space-y-6">

            {{-- Header with Add Button --}}
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="bg-orange-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">Companies List</h3>
                        <p class="text-sm text-gray-500">Manage company profiles</p>
                    </div>
                </div>
                <a
                    href="{{ route('companies.create') }}"
                    class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-xl transition duration-300 shadow-md flex items-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Company
                </a>
            </div>

            {{-- Search Bar --}}
            <x-searchbar 
                placeholder="Search companies by name, industry, address..." 
                :action="route('companies.index')"
                :value="request('search')"
                :filters="[
                    'label' => 'industries',
                    'options' => [
                        'Technology' => 'Technology',
                        'Finance' => 'Finance',
                        'Healthcare' => 'Healthcare',
                        'Education' => 'Education',
                        'Retail' => 'Retail',
                        'Manufacturing' => 'Manufacturing',
                        'Other' => 'Other'
                    ]
                ]"
                :selectedFilter="request('filter')"
            />

            {{-- Success Message --}}
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-xl shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-green-700 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            {{-- Companies Grid --}}
            @if ($companies->isEmpty())
                <div class="bg-white rounded-2xl shadow-md p-12 text-center">
                    <div class="bg-gray-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Companies Found</h3>
                    <p class="text-gray-500">Get started by adding your first company.</p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($companies as $company)
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="bg-gradient-to-r from-orange-500 to-orange-400 p-6">
                                <div class="bg-white p-3 rounded-xl inline-flex">
                                    @if ($company->profile_photo_path)
                                        <img src="{{ asset('storage/' . $company->profile_photo_path) }}" 
                                             alt="{{ $company->name }}" 
                                             class="w-12 h-12 object-cover rounded-lg">
                                    @else
                                        <svg class="w-12 h-12 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    @endif
                                </div>
                            </div>

                            <div class="p-6">
                                <h4 class="font-bold text-xl text-gray-800 mb-2">{{ $company->name }}</h4>
                                <p class="text-orange-600 font-semibold mb-4">{{ $company->industry ?? 'N/A' }}</p>

                                <div class="space-y-2 mb-4 text-sm text-gray-600">
                                    @if ($company->website)
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                            </svg>
                                            <a href="{{ $company->website }}" target="_blank" class="text-orange-600 hover:text-orange-700 truncate">
                                                {{ Str::limit($company->website, 30) }}
                                            </a>
                                        </div>
                                    @endif
                                    @if ($company->address)
                                        <div class="flex items-start gap-2">
                                            <svg class="w-4 h-4 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <span class="line-clamp-2">{{ $company->address }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div class="flex gap-2 mb-4">
                                    <a href="{{ route('companies.show', $company) }}"
                                        class="flex-1 text-center bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded-lg transition duration-300">
                                        View
                                    </a>
                                    <a href="{{ route('companies.edit', $company) }}"
                                        class="flex-1 text-center bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded-lg transition duration-300">
                                        Edit
                                    </a>
                                </div>

                                <form method="POST" action="{{ route('companies.destroy', $company) }}" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 rounded-lg transition duration-300"
                                        onclick="return confirm('Are you sure you want to delete this company?');">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
