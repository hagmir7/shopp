@extends('layouts.base')

@section('content')
<div class="max-w-6xl mx-auto mt-3 px-2 mb-9">
    <h2 class="text-lg md:text-xl py-4 font-bold">{{ __("Discover our latest") }} {{ $category->name }} {{ __("collection") }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($category->products as $product)
        <div class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
            <!-- Image Container -->
            <div class="relative overflow-hidden">
                <a href="{{ route('product.show', $product->slug) }}" class="block">
                    <img src="{{ Storage::url($product->images->first()->path) }}" alt="{{ $product->name }}"
                        class="w-full h-72 object-cover object-center transform group-hover:scale-105 transition-transform duration-300">
                </a>

                <!-- Discount Badge -->
                @if ($product->discount && ($product->discount > 0))
                <span
                    class="absolute top-4 left-4 bg-red-500 text-white px-4 py-1 rounded-full text-sm font-semibold shadow-md">
                    -{{ $product->discount }}%
                </span>
                @endif

                <!-- Quick Actions -->
                <div
                    class="absolute top-4 right-4 space-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button class="bg-white p-2 rounded-full shadow-md hover:bg-gray-50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                    <button class="bg-white p-2 rounded-full shadow-md hover:bg-gray-50 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Product Info -->
            <div class="p-4">
                <a href="{{ route('product.show', $product->slug) }}" class="block">
                    <h3
                        class="text-md font-bold text-gray-900 hover:text-gray-700 transition-colors duration-200 line-clamp-2">
                        {{ $product->name }}
                    </h3>
                </a>

                <!-- Rating -->
                <div class="flex items-center mt-2">
                    <div class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++) <svg
                            class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}"
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
                            {{ app("site")->currency }} {{ number_format($product->price * (1 - $product->discount/100), 2)
                            }}
                        </span>
                        @else
                        <span class="text-md font-bold text-gray-900">
                            {{ app("site")->currency }} {{ number_format($product->price, 2) }}
                        </span>
                        @endif
                    </div>

                    <button type="button"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-full transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        {{ __("Add to Cart") }}
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
