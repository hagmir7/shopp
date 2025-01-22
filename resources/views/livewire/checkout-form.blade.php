<div class="min-h-screen py-4">
    <div class="container mx-auto px-4">
        <div class="grid gap-8 lg:grid-cols-2 max-w-7xl mx-auto">
            <!-- Order Summary Section -->
            <div class="px-5">
                <div class="space-y-4">
                    <!-- Product 1 -->
                    <div class="flex flex-col sm:flex-row bg-white rounded-lg border p-4 gap-4">
                        <img class="h-24 w-24 object-cover rounded-md" src="/api/placeholder/200/200"
                            alt="Nike Shoes" />
                        <div class="flex-1 space-y-2">
                            <div class="flex justify-between">
                                <h3 class="font-medium text-gray-900">Nike Air Max Pro 8888 - Super Light</h3>
                                <p class="text-gray-900 font-semibold">$138.99</p>
                            </div>
                            <p class="text-sm text-gray-500">Size: 42EU - 8.5US</p>
                            <div class="flex items-center gap-2">
                                <select class="rounded border-gray-200 text-sm">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                                <button class="text-sm text-red-500 hover:text-red-600">Remove</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="flex flex-col sm:flex-row bg-white rounded-lg border p-4 gap-4">
                        <img class="h-24 w-24 object-cover rounded-md" src="/api/placeholder/200/200"
                            alt="Nike Shoes" />
                        <div class="flex-1 space-y-2">
                            <div class="flex justify-between">
                                <h3 class="font-medium text-gray-900">Nike Air Max Pro 8888 - Super Light</h3>
                                <p class="text-gray-900 font-semibold">$238.99</p>
                            </div>
                            <p class="text-sm text-gray-500">Size: 42EU - 8.5US</p>
                            <div class="flex items-center gap-2">
                                <select class="rounded border-gray-200 text-sm">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                                <button class="text-sm text-red-500 hover:text-red-600">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Details Section -->
            <div class="bg-white rounded-lg shadow-sm px-5 py-3">
                <h2 class="text-2xl font-semibold text-gray-900">{{ "Order detail" }}</h2>
                <p class="text-sm text-gray-500 mt-1">{{ __("Please enter your information here.") }}</p>

                <form class="mt-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text"
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter your full name">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input type="email"
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter your email">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <input type="tel"
                                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter your phone number">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Billing Address</label>
                        <input type="text"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500 mb-2"
                            placeholder="Street address">
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="City">
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="ZIP">
                        </div>
                    </div>

                    <!-- Order Summary -->
                    {{-- <div class="mt-6 border-t border-b py-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">$377.98</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium">$8.00</span>
                        </div>
                    </div> --}}

                    <div class="flex justify-between items-center">
                        <span class="text-lg font-medium">Total</span>
                        <span class="text-2xl font-semibold">$385.98</span>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                        Place Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
