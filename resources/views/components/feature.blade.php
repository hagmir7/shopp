<div class="md:px-4 sm:px-6 lg:px-8 mt-4">
    <div class="max-w-7xl mx-auto pb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Delivery Info Box -->
            <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-sm">
                <div class="w-12 h-12 mb-4">
                    <img src="{{ asset('assets/images/delivery.svg') }}" alt="Delivery icon" class="w-full h-full object-contain">
                </div>
                <h2 class="text-lg font-semibold mb-2">{{ __("Superfast Delivery") }}</h2>
                <p class="text-gray-600 text-center">{{ __("Free 48-hour delivery") }}</p>
            </div>

            <!-- Warehouse Info Box -->
            <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-sm">
                <div class="w-12 h-12 mb-4">
                    <img src="{{ asset('assets/images/products.svg') }}"  alt="Warehouse icon" class="w-full h-full object-contain">
                </div>
                <h2 class="text-lg font-semibold mb-2">{{ __("Warehouse to Door") }}</h2>
                <p class="text-gray-600 text-center">{{ __("Direct Savings Guaranteed") }}</p>
            </div>

            <!-- Support Info Box -->
            <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-sm">
                <div class="w-12 h-12 mb-4">
                    <img
                    src="{{ asset('assets/images/support.svg') }}"
                        alt="Support icon" class="w-full h-full object-contain">
                </div>
                <h2 class="text-lg font-semibold mb-2">{{ __("Instant Live Support") }}</h2>
                <p class="text-gray-600 text-center">{{ __("Available 8am - 8pm") }}</p>
            </div>

            <!-- Returns Info Box -->
            <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-sm">
                <div class="w-12 h-12 mb-4">
                    <img src="{{ asset('assets/images/return.svg') }}" alt="Returns icon" class="w-full h-full object-contain">
                </div>
                <h2 class="text-lg font-semibold mb-2">{{ __("Hassle-Free Returns") }}</h2>
                <p class="text-gray-600 text-center">{{ __("Return items within 2 days!") }}</p>
            </div>
        </div>
    </div>
</div>
