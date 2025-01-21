<!-- Enhanced Product Card -->
<div class="relative h-[280px] group overflow-hidden rounded-xl shadow-sm hover:shadow-md transition-all duration-500">
    <!-- Background with overlay -->
    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-700"
        style="background-image: url({{ __($image) }});">
    </div>

    <!-- Gradient overlay for better text visibility -->
    <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-transparent"></div>

    <!-- Content container -->
    <div class="relative z-10 h-full p-8 flex flex-col justify-between">
        <!-- Text content -->
        <div class="space-y-4">
            <span class="inline-block px-3 py-1 bg-white/90 text-gray-800 text-sm font-medium rounded-full backdrop-blur-sm">
               {{ __("New Arrival") }}
            </span>
            <h2 class="text-3xl font-bold text-white max-w-[240px] leading-tight drop-shadow-md">
               {{ $name }}
            </h2>
            <p class="text-white/90 max-w-[200px] text-sm">
                {{ __("Discover our latest collection for your active lifestyle") }}
            </p>
        </div>

        <!-- Button with enhanced hover effect -->
        <a href="{{ $url }}" class="inline-block group/btn mt-4">
            <button class="px-6 py-2.5 bg-white text-gray-800 hover:bg-gray-800 hover:text-white
                          flex items-center gap-2 rounded-md transition-all duration-300
                          transform group-hover/btn:translate-x-2">
                {{ __("Shop Now") }}
                <svg class="w-4 h-4 transition-transform duration-300 group-hover/btn:translate-x-1" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
        </a>
    </div>
</div>
