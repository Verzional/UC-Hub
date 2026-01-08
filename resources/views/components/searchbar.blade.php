@props([
    'placeholder' => 'Search...',
    'action' => '',
    'method' => 'GET',
    'value' => '',
    'filters' => [],
    'selectedFilter' => ''
])

<form action="{{ $action }}" method="{{ $method }}" class="mb-6">
    <div class="bg-white rounded-2xl shadow-md p-6">
        <div class="flex flex-col md:flex-row gap-4">
            {{-- Search Input --}}
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ $value }}"
                    placeholder="{{ $placeholder }}"
                    class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200"
                >
            </div>

            {{-- Filter Dropdown (if filters provided) --}}
            @if(count($filters) > 0)
                <div class="relative">
                    <select 
                        name="filter" 
                        class="w-full md:w-48 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition duration-200 appearance-none bg-white pr-10"
                    >
                        <option value="">All {{ ucfirst($filters['label'] ?? 'Items') }}</option>
                        @foreach($filters['options'] ?? [] as $key => $label)
                            <option value="{{ $key }}" {{ $selectedFilter == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            @endif

            {{-- Search Button --}}
            <button 
                type="submit"
                class="px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl transition duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span class="hidden md:inline">Search</span>
            </button>

            {{-- Clear Button (if search is active) --}}
            @if($value || $selectedFilter)
                <a 
                    href="{{ $action }}"
                    class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-xl transition duration-300 flex items-center justify-center gap-2"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <span class="hidden md:inline">Clear</span>
                </a>
            @endif
        </div>
    </div>
</form>
