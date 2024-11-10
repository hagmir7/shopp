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
            <h2 class="text-lg font-semibold">Shopping Cart</h2>
            <button @click="isOpen = false" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Cart Content -->
        <div class="p-4">
            <div class="space-y-4">
                <!-- Sample Cart Item -->
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gray-200 rounded"></div>
                    <div class="flex-1">
                        <h3 class="text-sm font-medium">Sample Product</h3>
                        <p class="text-sm text-gray-500">$99.99</p>
                    </div>
                    <button class="text-red-500 hover:text-red-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Cart Footer -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t bg-white">
            <div class="flex justify-between mb-4">
                <span class="font-medium">Total</span>
                <span class="font-bold">$99.99</span>
            </div>
            <button class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition-colors">
                Checkout
            </button>
        </div>
    </div>
</div>
