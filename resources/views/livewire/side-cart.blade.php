<div class="z-30" x-data="{ isOpen: false }">
    <!-- Cart Button -->
    <button type="button" @click="isOpen = !isOpen" :aria-expanded="isOpen" aria-label="{{ __('Shopping Cart') }}"
        class="hover:bg-amber-800 bg-amber-950 p-2 rounded-full relative text-white duration-200">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3" />
        </svg>
        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2">
            @livewire('cart-counter')
        </div>

    </button>

    <!-- Backdrop -->
    <div x-show="isOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50" @click="isOpen = false"
        style="display: none;">
    </div>

    <!-- Sidebar -->
    <div x-show="isOpen" x-transition:enter="transform transition-transform ease-in-out duration-300"
        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transform transition-transform ease-in-out duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg" @keydown.escape.window="isOpen = false" role="dialog"
        aria-labelledby="cart-title" style="display: none;">

        <!-- Cart Header -->
        <div class="flex items-center justify-between p-4 border-b">
            <h2 id="cart-title" class="text-lg font-semibold">{{ __("Shopping Cart") }}</h2>
            <button @click="isOpen = false" class="text-gray-500 hover:text-gray-700"
                aria-label="{{ __('Close cart') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

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
                    <input type="number" x-model.number="quantity" @change="updateQuantity()" @keydown.enter="updateQuantity()" min="1"
                        max="99" class="w-14 text-center border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500"
                        aria-label="Product quantity" />

                    <!-- Increase button -->
                    <button @click="quantity < max && (quantity++, updateQuantity())"
                        :class="{ 'opacity-50 cursor-not-allowed': quantity >= max }" :disabled="quantity >= max"
                        class="flex items-center justify-center w-8 h-8 transition-colors rounded-full bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        aria-label="Increase quantity">
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
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
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t bg-white">
            <div class="flex justify-between mb-4">
                <span class="font-medium">{{ __("Total") }}</span>
                <span class="font-bold">{{ app("site")->currency }} {{ \Cart::getTotal() }}</span>
            </div>
           <div class="w-full">
                @if(\Cart::isEmpty())
                <button disabled
                    class="opacity-50 cursor-not-allowed text-center w-full bg-blue-500 text-white py-2 px-4 rounded-lg transition-colors">
                    {{ __("Checkout") }}
                </button>
                @else
                <a href="{{ route('checkout') }}" class="inline-block text-center w-full bg-blue-500 text-white py-2 px-4 rounded-lg transition-colors hover:bg-blue-600">
                    {{ __("Checkout") }}
                </a>
            @endif
           </div>

        </div>
    </div>
</div>
