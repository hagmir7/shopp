@extends('layouts.base')

@section('content')
<div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <p class="text-sm text-green-600 mb-2">Shop by Category</p>
            <h2 class="text-4xl font-medium">
                <span class="text-green-600">Popular</span>
                <span class="text-gray-900">on the Shofy store.</span>
            </h2>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <!-- Frozen Food -->
            <div class="bg-green-50 rounded-lg p-4 transition-transform hover:scale-105">
                <h3 class="text-xl font-medium mb-2">Frozen Food</h3>
                <p class="text-sm text-gray-600 mb-4">5 products</p>
                <img src="/api/placeholder/200/200" alt="Frozen Food" class="w-full rounded-lg">
            </div>

            <!-- Meat & Seafood -->
            <div class="bg-pink-50 rounded-lg p-4 transition-transform hover:scale-105">
                <h3 class="text-xl font-medium mb-2">Meat & Seafood</h3>
                <p class="text-sm text-gray-600 mb-4">4 products</p>
                <img src="/api/placeholder/200/200" alt="Meat & Seafood" class="w-full rounded-lg">
            </div>

            <!-- Milk & Dairy -->
            <div class="bg-orange-50 rounded-lg p-4 transition-transform hover:scale-105">
                <h3 class="text-xl font-medium mb-2">Milk & Dairy</h3>
                <p class="text-sm text-gray-600 mb-4">11 products</p>
                <img src="/api/placeholder/200/200" alt="Milk & Dairy" class="w-full rounded-lg">
            </div>

            <!-- Beverages -->
            <div class="bg-green-50 rounded-lg p-4 transition-transform hover:scale-105">
                <h3 class="text-xl font-medium mb-2">Beverages</h3>
                <p class="text-sm text-gray-600 mb-4">4 products</p>
                <img src="/api/placeholder/200/200" alt="Beverages" class="w-full rounded-lg">
            </div>

            <!-- Vegetables -->
            <div class="bg-orange-50 rounded-lg p-4 transition-transform hover:scale-105">
                <h3 class="text-xl font-medium mb-2">Vegetables</h3>
                <p class="text-sm text-gray-600 mb-4">5 products</p>
                <img src="/api/placeholder/200/200" alt="Vegetables" class="w-full rounded-lg">
            </div>

            <!-- Fruits -->
            <div class="bg-pink-50 rounded-lg p-4 transition-transform hover:scale-105">
                <h3 class="text-xl font-medium mb-2">Fruits</h3>
                <p class="text-sm text-gray-600 mb-4">5 products</p>
                <img src="/api/placeholder/200/200" alt="Fruits" class="w-full rounded-lg">
            </div>
        </div>
    </div>
@endsection
