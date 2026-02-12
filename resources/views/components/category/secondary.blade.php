<!-- Enhanced Product Card -->
<div class="relative h-[280px] group overflow-hidden rounded-xl shadow-sm hover:shadow-md transition-all duration-500">
    <!-- Background with overlay -->
    <div class="absolute inset-0 bg-cover bg-center group-hover:scale-105 transition-transform duration-700"
        style="background-image: url({{ $image }});">
    </div>

    <!-- Gradient overlay for better text visibility -->
    <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-transparent"></div>

    <!-- Content container -->
    <div class="relative z-10 h-full p-8 flex flex-col justify-between">
        <!-- Text content -->
        <div class="space-y-4">
            <span
                class="inline-block px-3 py-1 bg-white/90 text-gray-800 text-sm font-medium rounded-full backdrop-blur-sm">
                {{ __("New Arrival") }}
            </span>
            <h2 class="text-2xl font-bold text-white max-w-[240px] leading-tight drop-shadow-md">
                {{ $name }}
            </h2>
            <p class="text-white/90 w-full text-sm">
                {{ Str::limit($description, 60, '...') }}
            </p>
        </div>

        <!-- Button with enhanced hover effect -->
        <a href="{{ $url }}" class="inline-block group/btn mt-4">
            <button
                class="btn btn-primary flex items-center rounded-md transition-all duration-300 transform group-hover/btn:translate-x-2">
                {{ __("Shop Now") }}

                @if (app()->getLocale() === "ar")
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-left">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M5 12l4 4" />
                    <path d="M5 12l4 -4" />
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M15 16l4 -4" />
                    <path d="M15 8l4 4" />
                </svg>
                @endif



            </button>
        </a>
    </div>
</div>
