<div class="z-30" x-data="{ isOpen: false }">

    <button type="button" @click="isOpen = true" class="hover:bg-amber-800 bg-amber-950 p-2 rounded-full  relative text-white duration-200">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3" />
        </svg>
        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2">
            20
        </div>
    </button>
    <!-- Backdrop -->
    <div x-show="isOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50" @click="isOpen = false">
    </div>

    <!-- Sidebar -->
    <div x-show="isOpen" x-transition:enter="transform transition-transform ease-in-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition-transform ease-in-out duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg" @keydown.escape.window="isOpen = false">

        <!-- Cart Header -->
        <div class="flex items-center justify-between p-4 border-b">
            <h2 class="text-lg font-semibold">{{ __("Shopping Cart") }}</h2>
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
                @foreach (\Cart::getContent() as $product)
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-gray-200 rounded">
                            <img src="{{ Storage::url($product->attributes['image']) }}" alt="">
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-medium">{{ $product->name }}</h3>
                            <p class="text-sm text-gray-500">{{ $product->price }} {{ app("site")->currency }}</p>
                            <p class="text-sm text-gray-500">{{ $product->attributes['color'] }}</p>
                        </div>
                        <button class="text-red-500 hover:text-red-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                @endforeach

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
