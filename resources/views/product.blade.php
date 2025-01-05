@extends('layouts.base')

@section('content')
<div class="min-h-screen md:py-8 md:px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Product Container -->
        <div class="bg-white md:rounded-xl md:shadow-sm border p-4 sm:p-6 lg:p-8">
            <!-- Product Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Image Section -->
                <div class="w-full">
                    <div class="rounded-lg overflow-hidden">
                        <x-product-showcase />
                    </div>
                </div>

                <!-- Product Details Section -->
                <div class="flex flex-col space-y-6">
                    <!-- Product Title -->
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">Product Name</h1>
                        <p class="mt-2 text-gray-600">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                            ante justo. Integer euismod libero id mauris malesuada tincidunt.
                        </p>
                    </div>

                    <!-- Price and Availability -->
                    <div class="flex flex-wrap gap-6 items-center">
                        <div>
                            <span class="ml-2 text-gray-600 text-2xl font-black">29.99 MAD</span>
                        </div>
                        <div>
                            <span class="ml-2 text-green-600 text-xl font-black">In Stock</span>
                        </div>
                        <button class="flex items-center gap-1 rounded-lg bg-amber-400 py-1 px-2 w-max">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_12657_16865)">
                                    <path
                                        d="M8.10326 2.26718C8.47008 1.52393 9.52992 1.52394 9.89674 2.26718L11.4124 5.33818C11.558 5.63332 11.8396 5.83789 12.1653 5.88522L15.5543 6.37768C16.3746 6.49686 16.7021 7.50483 16.1086 8.08337L13.6562 10.4738C13.4205 10.7035 13.313 11.0345 13.3686 11.3589L13.9475 14.7343C14.0877 15.5512 13.2302 16.1742 12.4966 15.7885L9.46534 14.1948C9.17402 14.0417 8.82598 14.0417 8.53466 14.1948L5.5034 15.7885C4.76978 16.1742 3.91235 15.5512 4.05246 14.7343L4.63137 11.3589C4.68701 11.0345 4.57946 10.7035 4.34378 10.4738L1.89144 8.08337C1.29792 7.50483 1.62543 6.49686 2.44565 6.37768L5.8347 5.88522C6.16041 5.83789 6.44197 5.63332 6.58764 5.33818L8.10326 2.26718Z"
                                        fill="white"></path>
                                    <g clip-path="url(#clip1_12657_16865)">
                                        <path
                                            d="M8.10326 2.26718C8.47008 1.52393 9.52992 1.52394 9.89674 2.26718L11.4124 5.33818C11.558 5.63332 11.8396 5.83789 12.1653 5.88522L15.5543 6.37768C16.3746 6.49686 16.7021 7.50483 16.1086 8.08337L13.6562 10.4738C13.4205 10.7035 13.313 11.0345 13.3686 11.3589L13.9475 14.7343C14.0877 15.5512 13.2302 16.1742 12.4966 15.7885L9.46534 14.1948C9.17402 14.0417 8.82598 14.0417 8.53466 14.1948L5.5034 15.7885C4.76978 16.1742 3.91235 15.5512 4.05246 14.7343L4.63137 11.3589C4.68701 11.0345 4.57946 10.7035 4.34378 10.4738L1.89144 8.08337C1.29792 7.50483 1.62543 6.49686 2.44565 6.37768L5.8347 5.88522C6.16041 5.83789 6.44197 5.63332 6.58764 5.33818L8.10326 2.26718Z"
                                            fill="white"></path>
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="clip0_12657_16865">
                                        <rect width="18" height="18" fill="white"></rect>
                                    </clipPath>
                                    <clipPath id="clip1_12657_16865">
                                        <rect width="18" height="18" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="text-base font-medium text-white">0</span>

                        </button>
                    </div>



                    <!-- Color Selection -->
                    <div>
                        <h2 class="font-semibold text-gray-900 mb-3">Select Color</h2>
                        <div class="flex flex-wrap gap-3">
                            <button
                                class="w-8 h-8 rounded-full bg-gray-900 ring-2 ring-offset-2 ring-gray-200 transition-all hover:ring-gray-300"></button>
                            <button
                                class="w-8 h-8 rounded-full bg-red-500 ring-2 ring-offset-2 ring-gray-200 transition-all hover:ring-gray-300"></button>
                            <button
                                class="w-8 h-8 rounded-full bg-blue-500 ring-2 ring-offset-2 ring-gray-200 transition-all hover:ring-gray-300"></button>
                            <button
                                class="w-8 h-8 rounded-full bg-yellow-500 ring-2 ring-offset-2 ring-gray-200 transition-all hover:ring-gray-300"></button>
                        </div>
                    </div>

                    <!-- Size Selection -->
                    <div>
                        <h2 class="font-semibold text-gray-900 mb-3">Select Size</h2>
                        <div class="flex flex-wrap gap-3">
                            <button
                                class="px-4 py-2 text-sm font-medium rounded-full bg-gray-100 text-gray-900 hover:bg-gray-200 transition-colors">S</button>
                            <button
                                class="px-4 py-2 text-sm font-medium rounded-full bg-gray-100 text-gray-900 hover:bg-gray-200 transition-colors">M</button>
                            <button
                                class="px-4 py-2 text-sm font-medium rounded-full bg-gray-100 text-gray-900 hover:bg-gray-200 transition-colors">L</button>
                            <button
                                class="px-4 py-2 text-sm font-medium rounded-full bg-gray-100 text-gray-900 hover:bg-gray-200 transition-colors">XL</button>
                            <button
                                class="px-4 py-2 text-sm font-medium rounded-full bg-gray-100 text-gray-900 hover:bg-gray-200 transition-colors">XXL</button>
                        </div>
                    </div>


                <div class="mt-6 sm:flex flex-initial space-y-4 sm:space-y-0 items-center flex-col min-[400px]:flex-row gap-3 mb-3 min-[400px]:mb-8">

                    <div class="flex items-center justify-center border border-gray-400 rounded-full">
                        <button class="group text-3xl py-2 px-3 w-full border-r border-gray-400 rounded-l-full h-full flex items-center justify-center bg-white shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">
                            -
                        </button>
                        <label class="hidden" for="qty">Quantity:</label>

                        <input type="number" name="qty" id="qty" value="1" class="font-semibold text-gray-900 text-lg py-3 px-2 w-full min-[400px]:min-w-[75px] h-full bg-transparent placeholder:text-gray-900 text-center hover:text-red-600 outline-0 hover:placeholder:text-red-600">
                        <button
                            class="group text-3xl py-2 px-3 w-full border-l border-gray-400 rounded-r-full h-full flex items-center justify-center bg-white shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">
                            +
                        </button>
                    </div>

                    <button class="group border-2 border-red-400 py-3 px-5 rounded-full bg-red-50 text-red-600 font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-red-300 hover:bg-red-100">
                        <div role="status" >
                            <svg
                                class="stroke-red-600 transition-all duration-500 group-hover:red-red-600" width="22" height="22"
                                viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.7394 17.875C10.7394 18.6344 10.1062 19.25 9.32511 19.25C8.54402 19.25 7.91083 18.6344 7.91083 17.875M16.3965 17.875C16.3965 18.6344 15.7633 19.25 14.9823 19.25C14.2012 19.25 13.568 18.6344 13.568 17.875M4.1394 5.5L5.46568 12.5908C5.73339 14.0221 5.86724 14.7377 6.37649 15.1605C6.88573 15.5833 7.61377 15.5833 9.06984 15.5833H15.2379C16.6941 15.5833 17.4222 15.5833 17.9314 15.1605C18.4407 14.7376 18.5745 14.0219 18.8421 12.5906L19.3564 9.84059C19.7324 7.82973 19.9203 6.8243 19.3705 6.16215C18.8207 5.5 17.7979 5.5 15.7522 5.5H4.1394ZM4.1394 5.5L3.66797 2.75"
                                    stroke="" stroke-width="1.6" stroke-linecap="round"></path>
                            </svg>
                        </div>
                        Ajouter au panier
                    </button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<x-feature />


{{-- <x-cover /> --}}
@endsection


