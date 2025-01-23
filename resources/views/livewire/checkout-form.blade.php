<div class="min-h-screen py-4">
    <div class="container mx-auto px-4">
        <form wire:submit.prevent="placeOrder">
            <div class="grid gap-8 lg:grid-cols-2 max-w-7xl mx-auto">
                <!-- Order Summary Section -->
                <div class="px-5">
                    <div class="space-y-4">
                        @foreach($cart_items as $item)
                        <div wire:key="{{ $item['id'] }}"
                            class="flex flex-col sm:flex-row bg-white rounded-lg border p-4 gap-4">
                            <img class="h-24 w-24 object-cover rounded-md"
                                src="{{ Storage::url($item['attributes']['image']) }}" alt="{{ $item['name'] }}" />
                            <div class="flex-1 space-y-2">
                                <div class="flex justify-between">
                                    <h3 class="font-medium text-gray-900">{{ $item['name'] }}</h3>
                                    <p class="text-gray-900 font-semibold">${{ number_format($item['price'], 2) }}</p>
                                </div>
                                <p class="text-sm text-gray-500">Size: {{ $item['attributes']['size'] ?? 'N/A' }}</p>
                                <div class="flex items-center gap-2">
                                    <input type="number" wire:model.live="cart_items.{{ $item['id'] }}.quantity"
                                        wire:change="updateQuantity('{{ $item['id'] }}', $event.target.value)" min="1"
                                        class="w-20 rounded border-gray-200 text-sm">
                                    <button type="button" wire:click="removeItem('{{ $item['id'] }}')"
                                        class="text-sm text-red-500 hover:text-red-600">
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Payment Details Section -->
                <div class="bg-white rounded-lg shadow-sm px-5 py-3">
                    <h2 class="text-2xl font-semibold text-gray-900">{{ __("Order Details") }}</h2>

                    @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <div class="mt-6 space-y-4">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                <input type="text" wire:model="first_name"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500"
                                    placeholder="First Name">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                <input type="text" wire:model="last_name"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500"
                                    placeholder="Last Name">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" wire:model="email"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500"
                                placeholder="Email Address">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" wire:model="phone"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500"
                                placeholder="Phone Number">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Shipping Address</label>
                            <input type="text" wire:model="address"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500 mb-2"
                                placeholder="Street Address">
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" wire:model="city"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500"
                                    placeholder="City">
                                <input type="text" wire:model="zip"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-blue-500"
                                    placeholder="ZIP Code">
                            </div>
                        </div>

                        <div class="mt-4 border-t pt-4">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium">${{ number_format(\Cart::getTotal(), 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-medium">${{ number_format($shipping_cost, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-lg font-medium">Total</span>
                                <span class="text-2xl font-semibold">${{ number_format($total_amount, 2) }}</span>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                            Place Order
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
