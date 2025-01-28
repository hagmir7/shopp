<div class="z-30" x-data="{ isOpen: false }">
    <!-- Simplified button with only necessary attributes -->
    <button type="button" @click="isOpen = !isOpen"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15" />
        </svg>
    </button>

    <!-- Backdrop -->
    <div x-show="isOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50" @click="isOpen = false"
        style="display: none;">
    </div>

    <!-- Sidebar -->
    <div x-show="isOpen" x-transition:enter="transform transition-transform ease-in-out duration-300"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition-transform ease-in-out duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 h-full w-80 bg-white shadow-lg" @keydown.escape.window="isOpen = false"
        style="display: none;">

        <!-- Menu Header -->
        <div class="flex items-center justify-between p-4 border-b">
            @if (app('site')->logo)
            <img src="{{ Storage::url(app('site')->logo) }}" alt="{{ app('site')->name }}" class="h-12">
            @else
            <h2 class="text-2xl font-semibold">{{ app('site')->name }}</h2>
            @endif

            <button @click="isOpen = false" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Menu Content -->
        <div class="bg-white">
            <!-- Search Bar -->
            <div class="p-4 border-b">
                <div class="relative">
                    <input type="text" placeholder="{{ __("Search for products") }}" class="w-full p-2 pl-10 border rounded-lg">
                    <svg class="absolute left-3 top-3 w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <!-- Menu Items -->
            <nav class="divide-y">
                <x-nav.mobile-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav.mobile-link>
                {{-- <a href="" class="" :active="request()->routeIs('home')">{{ __("Home") }}</a> --}}
                @foreach (app("site")->urls->where('mobile_menu') as $item)
                <x-nav.mobile-link href="{{ $item->path }}" :active="request()->path() === $item->path">
                    {{ $item->name }}
                </x-nav.mobile-link>
                @endforeach
            </nav>
        </div>

        <!-- Menu Footer -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t bg-white">
            <a href="{{ route("auth.login") }}" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
                {{ __("Login / Register") }}
            </a>
        </div>
    </div>
</div>
