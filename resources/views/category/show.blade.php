@extends('layouts.base')

@section('content')
<div class="max-w-6xl mx-auto mt-3 px-2 mb-9">
    <h2 class="text-lg md:text-xl py-4 font-bold">{{ __("Collection") }} {{ $title }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($products as $product)
        <div class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
            <!-- Image Container -->
            <div class="relative overflow-hidden">
                <a href="{{ route('product.show', $product->slug) }}" class="block">
                    @if ($product->images->isNotEmpty())
                    <img src="{{ Storage::url($product->images->first()->path) }}" alt="{{ $product->name }}"
                        class="w-full h-72 object-cover object-center transform group-hover:scale-105 transition-transform duration-300">
                    @else
                    <img src="{{ asset('images/default-placeholder.png') }}" alt="Default Image"
                        class="w-full h-72 object-cover object-center">
                    @endif
                </a>

                <!-- Discount Badge -->
               @if ($product->discount && ($product->discount > 0))
                <span class="absolute top-4 left-4 bg-red-700 text-white px-4 py-1 rounded-full text-sm font-semibold shadow-md">
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
                <!-- Price and Add to Cart -->
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex flex-col">
                        @if ($product->discount && ($product->discount > 0))
                        <span class="text-md text-gray-500 line-through">
                            {{ app("site")->currency }} {{ number_format($product->price, 2) }}
                        </span>
                        <span class="text-xl font-bold text-gray-900">
                            {{ app("site")->currency }} {{ number_format($product->price * (1 - $product->discount/100),
                            2) }}
                        </span>
                        @else
                        <span class="text-xl font-bold text-gray-900">
                            {{ app("site")->currency }} {{ number_format($product->price, 2) }}
                        </span>
                        @endif
                    </div>
                    {{-- <button
                        class="inline-flex justify-center rounded-lg text-sm font-semibold py-2.5 px-4 bg-slate-900 text-white hover:bg-slate-700">
                        <span>{{ __("Add to Cart") }}</span>
                    </button> --}}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
