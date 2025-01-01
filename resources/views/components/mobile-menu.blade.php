<div class="z-30" x-data="{ isOpen: false }">
    <button data-collapse-toggle="navbar-default" type="button" @click="isOpen = true"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
        aria-controls="navbar-default" aria-expanded="false">
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
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50" @click="isOpen = false">
    </div>

    <!-- Sidebar -->
    <div x-show="isOpen" x-transition:enter="transform transition-transform ease-in-out duration-300"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition-transform ease-in-out duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 h-full w-80 bg-white shadow-lg" @keydown.escape.window="isOpen = false">

        <!-- Cart Header -->
        <div class="flex items-center justify-between p-4 border-b">
            @if (app('site')->logo)
                <img src="{{ Storage::url(app('site')->logo) }}" alt="{{ app('site')->name }}" class="h-12">
            @else
                <h2 class="text-lg font-semibold">{{ app('site')->name }}</h2>
            @endif


            <button @click="isOpen = false" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Cart Content -->
        <div class="bg-white">
            <!-- Search Bar -->
            <div class="p-4 border-b">
                <div class="relative">
                    <input type="text" placeholder="Search for products" class="w-full p-2 pl-10 border rounded-lg">
                    <svg class="absolute left-3 top-3 w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <!-- Menu Items -->
            <nav class="divide-y">
                <a href="#" class="block px-4 py-3 hover:bg-gray-50">Shop All</a>
                <a href="#" class="block px-4 py-3 hover:bg-gray-50">Help Centre – FAQ</a>
                <a href="#" class="block px-4 py-3 hover:bg-gray-50">Contact Us</a>
                <a href="#" class="block px-4 py-3 hover:bg-gray-50">Expert Flooring Advice</a>
                <a href="#" class="block px-4 py-3 hover:bg-gray-50">About Us</a>
                <a href="#" class="block px-4 py-3 text-orange-500 hover:bg-gray-50">Home</a>
                <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        Wishlist
                    </span>
                </a>
                <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                        Compare
                    </span>
                </a>

            </nav>
        </div>

        <!-- Cart Footer -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t bg-white">
            <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
                Login / Register
            </button>
        </div>
    </div>
</div>
