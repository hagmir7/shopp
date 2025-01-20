<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- Product Card 1 -->
    @foreach ($products as $product)
    <div class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
        <!-- Image Container -->
        <div class="relative overflow-hidden">
            <a href="{{ route('product.show', $product->slug) }}" class="block">
                <img src="{{ Storage::url($product->images->first()->path) }}" alt="{{ $product->name }}" class="w-full h-72 md:h-60 object-cover md:object-center transform group-hover:scale-105 transition-transform duration-300">
            </a>

            <!-- Discount Badge -->
            @if ($product->discount && ($product->discount > 0))
            <span
                class="absolute top-4 left-4 bg-red-500 text-white px-4 py-1 rounded-full text-sm font-semibold shadow-md">
                -{{ $product->discount }}%
            </span>
            @endif
        </div>

        <!-- Product Info -->
        <div class="p-4">
            <a href="{{ route('product.show', $product->slug) }}" class="block">
                <h3 class="text-md font-bold text-gray-900 hover:text-gray-700 transition-colors duration-200 line-clamp-2">
                    {{ $product->name }}
                </h3>
            </a>

            <!-- Rating -->
            <div class="flex items-center mt-2">
                <div class="flex items-center">
                    @for ($i = 1; $i <= 5; $i++) <svg class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        @endfor
                </div>
                <span class="text-sm text-gray-500 ml-2">(4.0)</span>
            </div>

            <!-- Price and Add to Cart -->
            <div class="mt-4 flex items-center justify-between">
                <div class="flex flex-col">
                    @if ($product->discount && ($product->discount > 0))
                    <span class="text-sm text-gray-500 line-through">
                        {{ app("site")->currency }} {{ number_format($product->price, 2) }}
                    </span>
                    <span class="text-md font-bold text-gray-900">
                        {{ app("site")->currency }} {{ number_format($product->price * (1 - $product->discount/100), 2) }}
                    </span>
                    @else
                    <span class="text-md font-bold text-gray-900">
                        {{ app("site")->currency }} {{ number_format($product->price, 2) }}
                    </span>
                    @endif
                </div>
                <button class="inline-flex justify-center rounded-lg text-sm font-semibold py-2.5 px-4 bg-slate-900 text-white hover:bg-slate-700">
                    <span>{{ __("Add to Cart") }}</span>
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>
