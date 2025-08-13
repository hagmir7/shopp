@if($products->count() > 0)
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- Product Card 1 -->
    @foreach ($products as $product)
    <div class="group bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
        <!-- Image Container -->
        <div class="relative overflow-hidden">
            <a href="{{ route('product.show', $product->slug) }}" class="block image-wrapper loading">
                <x-image image="{{ Storage::url($product->images->first()->path) }}" alt="{{ $product->name }}"
                    class="w-full h-72 md:h-60 object-cover md:object-center transform group-hover:scale-105 transition-transform duration-300" />
            </a>
            <!-- Discount Badge -->
            @if ($product->discount && ($product->discount > 0))
            <span
                class="absolute top-4 left-4 bg-red-700 text-white px-4 py-1 rounded-full text-sm font-semibold shadow-md">
                -{{ $product->discount }}%
            </span>
            @endif
        </div>

        <!-- Product Info -->
        <div class="p-4">
            <a href="{{ route('product.show', $product->slug) }}" class="block">
                <h3
                    class="text-md font-bold text-gray-900 hover:text-gray-700 transition-colors duration-200 line-clamp-2">
                    {{ $product->name }}
                </h3>
            </a>

            <!-- Price and Add to Cart -->
            <div class="mt-4 flex items-center justify-between ">
                <div class="flex flex-col text-primary">
                    @if ($product->discount && ($product->discount > 0))
                    <span class="text-md line-through text-gray-500">
                        {{ number_format($product->price, 2) }} {{ app("site")->currency }}
                    </span>
                    <span class="text-xl font-bold">
                        {{ number_format($product->price * (1 - $product->discount/100), 2) }} {{ app("site")->currency}}
                    </span>
                    @else
                    <span class="text-xl font-bold">
                        {{ number_format($product->price, 2) }} {{ app("site")->currency }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<!-- Empty State -->
<div class="flex flex-col items-center justify-center py-16 px-4">
    <div class="mb-6">
        <!-- Shopping bag icon -->
        <svg class="w-24 h-24 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
        </svg>
    </div>
    <h3 class="text-xl font-semibold text-gray-600 mb-2">{{ __("No Products Found") }}</h3>
    <p class="text-gray-500 text-center max-w-md mb-6">
        {{ __("We couldn't find any products matching your criteria. Try adjusting your filters or check back later.") }}
    </p>
</div>
@endif
