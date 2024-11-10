@extends('layouts.base')



@section('content')
<x-section />

    @livewire('home-category')
    <div class="max-w-7xl mx-auto mt-3 px-2 mb-9">
        <h2 class="text-xl md:text-2xl py-4 font-bold">Top Weekly Picks</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Product Card 1 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="relative">
                    <img src="https://floorwarehouse.co.uk/wp-content/uploads/2024/04/deep-grey-oak-plank-brushed-oiled-150mm-x-14mm-engineered-wooden-flooring-350x400.jpg" alt="Wooden Flooring" class="w-full h-48 md:h-64 object-cover">
                    <span
                        class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        SALE
                    </span>
                </div>
                <div class="p-2">
                    <h3 class="text-md md:text-lg font-bold text-gray-900 mb-2">Natural Oak Laminate Flooring</h3>
                    <div class="flex items-center mb-4">
                        <span class="text-2xl font-bold text-gray-900">24.99MAD</span>
                        <span class="ml-2 line-through text-gray-400">£29.99</span>
                    </div>
                    <button class="rounded-pill w-full text-gray-900 bg-[#e0b15e] py-2 px-4 rounded-full text-sm font-semibold hover:text-white bg-opacity-50">
                        Add to Cart
                    </button>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="relative">
                    <img src="https://floorwarehouse.co.uk/wp-content/uploads/2024/04/deep-grey-oak-plank-brushed-oiled-150mm-x-14mm-engineered-wooden-flooring-350x400.jpg"
                        alt="Wooden Flooring" class="w-full h-48 md:h-64 object-cover">
                    <span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        SALE
                    </span>
                </div>
                <div class="p-2">
                    <h3 class="text-md md:text-lg font-bold text-gray-900 mb-2">Natural Oak Laminate Flooring</h3>
                    <div class="flex items-center mb-4">
                        <span class="text-2xl font-bold text-gray-900">24.99MAD</span>
                        <span class="ml-2 line-through text-gray-400">£29.99</span>
                    </div>
                    <button
                        class="rounded-pill w-full text-gray-900 bg-[#e0b15e] py-2 px-4 rounded-full text-sm font-semibold hover:text-white bg-opacity-50">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
