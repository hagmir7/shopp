<div class="flex flex-col items-center group">
    <div class="bg-amber-50 border-2 rounded-full p-6 mb-4 w-40 h-40 flex items-center justify-center transition-transform group-hover:scale-105">
        <a href="{{ $url }}">
            <img src="{{ $image }}" alt="{{ $name }}" class="w-24 h-24 object-contain">
        </a>
    </div>
    <h3 class="text-lg font-semibold text-gray-800"><a href="{{ $url }}">{{ $name }}</a></h3>
    {{-- <p class="text-sm text-gray-600"> {{ $products }} {{ __("products") }}</p> --}}
</div>

