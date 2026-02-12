@extends('layouts.base')

@section('content')
<div class="max-w-6xl mx-auto mt-3 px-2 mb-9">
    <h2 class="text-lg md:text-xl py-4 font-bold">{{ __("Collection") }} {{ $title }}</h2>
    <div
        class="{{ app('site')?->options['card_grid'] ?? 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 md:gap-4' }}">
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
                        class="text-sm md:text-base font-semibold md:font-bold text-gray-900 hover:text-gray-700 transition-colors duration-200 line-clamp-1">
                        {{ $product->name }}
                    </h3>
                </a>

                <!-- Price and Add to Cart -->
                <div class="mt-2 md:mt-4 flex items-center justify-between ">
                    <div class="flex flex-col text-primary">
                        @if ($product->discount && ($product->discount > 0))
                        <span class="text-sm md:text-base line-through text-gray-500">
                            {{ number_format($product->price, 2) }} {{ app("site")->currency }}
                        </span>
                        <span class="text-base md:text-xl font-bold">
                            {{ number_format($product->price * (1 - $product->discount/100), 2) }} {{
                            app("site")->currency}}
                        </span>
                        @else
                        <span class="text-base md:text-xl font-bold">
                            {{ number_format($product->price, 2) }} {{ app("site")->currency }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
