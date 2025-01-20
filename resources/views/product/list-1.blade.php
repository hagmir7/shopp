@extends('layouts.base')

@section('content')
<div class="max-w-5xl mx-auto mt-3">
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
        <!-- Product Card 1 -->
        <div class="bg-white p-4 rounded-lg relative mb-10">
            <!-- Product Image -->
            <div class="relative mb-4">
                <img src="https://shofy-grocery.botble.com/storage/main/products/product-5-600x600.jpg" alt="Product" class="w-full rounded-lg">
                <div class="absolute top-2 left-2">
                    <span class="bg-red-500 text-white px-2 py-1 text-sm rounded">-18%</span>
                </div>

                <!-- Action Buttons -->
                <div class="absolute right-2 top-2 flex flex-col gap-2">
                    <button class="bg-white p-2 rounded-full shadow hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 17 17" fill="currentColor">
                            <path
                                d="M3.34706 4.53799L3.85961 10.6239C3.89701 11.0923 4.28036 11.4436 4.74871 11.4436H14.0282C14.4711 11.4436 14.8493 11.1144 14.9122 10.6774L15.7197 5.11162C15.7384 4.97924 15.7053 4.84687 15.6245 4.73995C15.5446 4.63218 15.4273 4.5626 15.2947 4.54393C15.1171 4.55072 7.74498 4.54054 3.34706 4.53799Z" />
                        </svg>
                    </button>
                    <button class="bg-white p-2 rounded-full shadow hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 18 15" fill="currentColor">
                            <path
                                d="M8.99948 5.06828C7.80247 5.06828 6.82956 6.04044 6.82956 7.23542C6.82956 8.42951 7.80247 9.40077 8.99948 9.40077C10.1965 9.40077 11.1703 8.42951 11.1703 7.23542C11.1703 6.04044 10.1965 5.06828 8.99948 5.06828Z" />
                        </svg>
                    </button>
                    <button class="bg-white p-2 rounded-full shadow hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 18 18" fill="currentColor">
                            <path
                                d="M1.60355 7.98635C2.83622 11.8048 7.7062 14.8923 9.0004 15.6565C10.299 14.8844 15.2042 11.7628 16.3973 7.98985C17.1806 5.55102 16.4535 2.46177 13.5644 1.53473C12.1647 1.08741 10.532 1.35966 9.40484 2.22804C9.16921 2.40837 8.84214 2.41187 8.60476 2.23329Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Product Content -->
            <div class="space-y-2">
                <div class="text-sm text-gray-600">
                    <a href="#" class="hover:text-green-600">Global Office</a>
                </div>

                <h3 class="font-medium text-lg">
                    <a href="#" class="hover:text-green-600 line-clamp-1">Almond Butter (Digital)</a>
                </h3>

                <!-- Price -->
                <div class="flex items-center gap-2">
                    <span class="text-xl font-medium">$1,764.18</span>
                    <span class="text-gray-500 line-through text-sm">$2,178.00</span>
                </div>
            </div>
        </div>

        <!-- Product Card 2 -->
        <div class="bg-white p-4 rounded-lg relative mb-10">
            <!-- Product Image -->
            <div class="relative mb-4">
                <img src="https://shofy-grocery.botble.com/storage/main/products/product-5-600x600.jpg" alt="Product" class="w-full rounded-lg">
                <div class="absolute top-2 left-2">
                    <span class="bg-red-500 text-white px-2 py-1 text-sm rounded">-35%</span>
                </div>

                <!-- Action Buttons -->
                <div class="absolute right-2 top-2 flex flex-col gap-2">
                    <button class="bg-white p-2 rounded-full shadow hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 17 17" fill="currentColor">
                            <path
                                d="M3.34706 4.53799L3.85961 10.6239C3.89701 11.0923 4.28036 11.4436 4.74871 11.4436H14.0282C14.4711 11.4436 14.8493 11.1144 14.9122 10.6774L15.7197 5.11162C15.7384 4.97924 15.7053 4.84687 15.6245 4.73995C15.5446 4.63218 15.4273 4.5626 15.2947 4.54393C15.1171 4.55072 7.74498 4.54054 3.34706 4.53799Z" />
                        </svg>
                    </button>
                    <button class="bg-white p-2 rounded-full shadow hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 18 15" fill="currentColor">
                            <path
                                d="M8.99948 5.06828C7.80247 5.06828 6.82956 6.04044 6.82956 7.23542C6.82956 8.42951 7.80247 9.40077 8.99948 9.40077C10.1965 9.40077 11.1703 8.42951 11.1703 7.23542C11.1703 6.04044 10.1965 5.06828 8.99948 5.06828Z" />
                        </svg>
                    </button>
                    <button class="bg-white p-2 rounded-full shadow hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5" viewBox="0 0 18 18" fill="currentColor">
                            <path
                                d="M1.60355 7.98635C2.83622 11.8048 7.7062 14.8923 9.0004 15.6565C10.299 14.8844 15.2042 11.7628 16.3973 7.98985C17.1806 5.55102 16.4535 2.46177 13.5644 1.53473C12.1647 1.08741 10.532 1.35966 9.40484 2.22804C9.16921 2.40837 8.84214 2.41187 8.60476 2.23329Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Product Content -->
            <div class="space-y-2">
                <div class="text-sm text-gray-600">
                    <a href="#" class="hover:text-green-600">Robert's Store</a>
                </div>

                <h3 class="font-medium text-lg">
                    <a href="#" class="hover:text-green-600 line-clamp-1">Whole Pineapple</a>
                </h3>

                <!-- Price -->
                <div class="flex items-center gap-2">
                    <span class="text-xl font-medium">$1,426.00</span>
                    <span class="text-gray-500 line-through text-sm">$2,227.00</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
