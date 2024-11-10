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
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transition-shadow duration-300">
                <div class="relative">
                    <img src="https://floorwarehouse.co.uk/wp-content/uploads/2024/04/deep-grey-oak-plank-brushed-oiled-150mm-x-14mm-engineered-wooden-flooring-350x400.jpg"
                        alt="Wooden Flooring" class="w-full h-48 md:h-64 object-cover">
                    <span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        SALE
                    </span>
                </div>
                <div class="p-2">
                    <h3 class="text-md md:text-lg font-bold text-gray-900 mb-2">Natural Oak Laminate Flooring</h3>
                    <div class="space-x-1 flex">

                        <svg class="w-5 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                            <path
                                d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                            </path>
                        </svg>
                        <svg class="w-5 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                            <path
                                d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                            </path>
                        </svg>
                        <svg class="w-5 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                            <path
                                d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                            </path>
                        </svg>
                        <svg class="w-5 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                            <path
                                d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                            </path>
                        </svg>
                        <svg class="w-5 mx-px fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                            <path
                                d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="mt-4 flex items-center justify-between gap-4">
                        <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">$499</p>

                        <button type="button" class="rounded-pill w-full text-gray-900 bg-[#e0b15e] py-2 px-4 rounded-full text-sm font-semibold hover:text-white bg-opacity-50 flex items-center justify-center ">
                            <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6">
                                </path>
                            </svg>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
