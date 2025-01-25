<nav class="fixed lg:hidden bottom-0 left-0 right-0 w-full bg-white border-t border-gray-300 shadow-md rounded-t-xl">
    @if (Str::contains(request()->fullUrl(), 'product'))
    <div class="px-4 mb-3">
        <a href="#buy-now"
            class="w-full mt-4 flex items-center justify-center gap-2 rounded-lg bg-amber-400 px-4 py-3 text-sm font-semibold text-gray-900 shadow-sm transition-all duration-200 hover:bg-amber-500 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 active:translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed md:hidden">
            {{ __("Buy Now") }}
        </a>
    </div>
    @endif
    <div class="flex justify-around items-center py-2">
        <!-- Shop -->
        <a href="{{ route("shop") }}" class="flex flex-col items-center justify-center text-gray-600 hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M8.935 7H7.773c-1.072 0-1.962.81-2.038 1.858l-.73 10C4.921 20.015 5.858 21 7.043 21h9.914c1.185 0 2.122-.985 2.038-2.142l-.73-10C18.189 7.81 17.299 7 16.227 7h-1.162m-6.13 0V5c0-1.105.915-2 2.043-2h2.044c1.128 0 2.043.895 2.043 2v2m-6.13 0h6.13" />
            </svg>
            <span class="text-sm">{{ __("Shop") }}</span>
        </a>

        <!-- Wishlist -->
        <a href="{{ route('category.list') }}" class="flex flex-col items-center justify-center text-gray-600 hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M3 6.75c0-1.768 0-2.652.55-3.2C4.097 3 4.981 3 6.75 3c1.768 0 2.652 0 3.2.55c.55.548.55 1.432.55 3.2s0 2.652-.55 3.2c-.548.55-1.432.55-3.2.55s-2.652 0-3.2-.55C3 9.403 3 8.519 3 6.75m0 10.507c0-1.768 0-2.652.55-3.2c.548-.55 1.432-.55 3.2-.55s2.652 0 3.2.55c.55.548.55 1.432.55 3.2s0 2.652-.55 3.2c-.548.55-1.432.55-3.2.55s-2.652 0-3.2-.55C3 19.91 3 19.026 3 17.258M13.5 6.75c0-1.768 0-2.652.55-3.2c.548-.55 1.432-.55 3.2-.55s2.652 0 3.2.55c.55.548.55 1.432.55 3.2s0 2.652-.55 3.2c-.548.55-1.432.55-3.2.55s-2.652 0-3.2-.55c-.55-.548-.55-1.432-.55-3.2m0 10.507c0-1.768 0-2.652.55-3.2c.548-.55 1.432-.55 3.2-.55s2.652 0 3.2.55c.55.548.55 1.432.55 3.2s0 2.652-.55 3.2c-.548.55-1.432.55-3.2.55s-2.652 0-3.2-.55c-.55-.548-.55-1.432-.55-3.2" />
            </svg>
            <span class="text-sm">{{ __("Categories") }}</span>
        </a>

        <!-- Cart -->
        <a href="#" class="relative flex flex-col items-center justify-center text-gray-600 hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1 font-bold" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3" />
            </svg>
            <span class="text-sm">{{ __("Cart") }}</span>
            <!-- Notification Badge -->
            <span class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-yellow-500 text-white text-xs rounded-full px-1.5 py-0.5">0</span>
        </a>

        <!-- My Account -->
        <a href="#" class="flex flex-col items-center justify-center text-gray-600 hover:text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M4.5 6.5h15M4.5 12h15m-15 5.5h15" />
            </svg>
            <span class="text-sm">{{ __("Menu") }}</span>
        </a>
    </div>
</nav>
