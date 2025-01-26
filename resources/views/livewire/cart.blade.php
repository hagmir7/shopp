<div class="bg-white shadow-sm rounded-md overflow-hidden">
    <!-- Cart Content -->
    <div class="p-4">
        <div class="space-y-4">
            @if(\Cart::isEmpty())
            <div class="text-center py-8 text-gray-500">
                {{ __("Your cart is empty") }}
            </div>
            @else
            @foreach (\Cart::getContent() as $productId => $product)
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-gray-200 rounded overflow-hidden">
                    <img src="{{ Storage::url($product->attributes['image']) }}" alt="{{ $product->name }}"
                        class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-medium">{{ $product->name }}</h3>
                    {{-- <p class="text-sm text-gray-500">{{ $product->attributes['description'] }}</p> --}}
                    <p class="text-sm text-gray-500">
                        {{ $product->price }} {{ app("site")->currency }} x {{ $product->quantity }}
                    </p>
                    <p class="text-sm text-gray-500">{{ $product->attributes['color'] }}</p>

                    <div wire:key="cart-item-{{ $productId }}" x-data="{
                                quantity: {{ $product->quantity }},
                                min: 1,
                                max: 99,
                                updateQuantity() {
                                    if (this.quantity >= this.min && this.quantity <= this.max) {
                                        $wire.updateQuantity('{{ $productId }}', this.quantity)
                                    }
                                }
                            }" class="flex items-center space-x-3 max-w-[140px] select-none" wire:ignore>

                        <!-- Decrease button -->
                        <button @click="quantity > min && (quantity--, updateQuantity())"
                            :class="{ 'opacity-50 cursor-not-allowed': quantity <= min }" :disabled="quantity <= min"
                            class="flex items-center justify-center w-8 h-8 transition-colors rounded-full bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            aria-label="Decrease quantity">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </button>

                        <!-- Input field -->
                        <input type="number" x-model.number="quantity" @change="updateQuantity()"
                            @keydown.enter="updateQuantity()" min="1" max="99"
                            class="w-14 text-center border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500"
                            aria-label="Product quantity" />

                        <!-- Increase button -->
                        <button @click="quantity < max && (quantity++, updateQuantity())"
                            :class="{ 'opacity-50 cursor-not-allowed': quantity >= max }" :disabled="quantity >= max"
                            class="flex items-center justify-center w-8 h-8 transition-colors rounded-full bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            aria-label="Increase quantity">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="button" class="text-red-500 hover:text-red-700" wire:click="delete('{{ $productId }}')"
                    wire:loading.class="opacity-50" wire:loading.attr="disabled"
                    aria-label="{{ __('Remove :product from cart', ['product' => $product->name]) }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
            @endforeach
            @endif
        </div>
    </div>

    <!-- Cart Footer -->
    <div class="p-4 border-t bg-white">
        <div class="flex justify-between mb-4">
            <span class="font-medium">{{ __("Total") }}</span>
            <span class="font-bold">{{ app("site")->currency }} {{ \Cart::getTotal() }}</span>
        </div>
        <div class="w-full">
            @if(\Cart::isEmpty())
            <button disabled
                class="opacity-50 text-center cursor-not-allowed w-full bg-blue-500 text-white py-2 px-4 rounded-lg transition-colors">
                {{ __("Checkout") }}
            </button>
            @else
            <a href="{{ route('checkout') }}"
                class="inline-block text-center w-full bg-blue-500 text-white py-2 px-4 rounded-lg transition-colors hover:bg-blue-600">
                {{ __("Checkout") }}
            </a>
            @endif
        </div>

    </div>
</div>
