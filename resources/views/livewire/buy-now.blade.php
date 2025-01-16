<div x-data="{modalIsOpen: false}" class="w-full">
    <button @click="modalIsOpen = true" type="button"
        class="w-full flex items-center justify-center gap-2 rounded-pill text-gray-900 bg-[#e0b15e] py-3 px-4 rounded-md text-sm font-semibold hover:text-gray-600">
        <span>{{ __("Buy Now") }}</span>
    </button>
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms @keydown.esc.window="modalIsOpen = false"
        @click.self="modalIsOpen = false"
        class="fixed inset-0 z-30 md:flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
        role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen"
            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
            x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
            class="flex flex-col gap-4 overflow-hidden md:min-w-[500px] rounded-md border border-neutral-300 bg-white text-neutral-600">
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900">
                    {{ __("Order information") }}
                </h3>
                <button @click="modalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                        fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Dialog Body -->
            <form class="max-w-7xl px-5 grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    {{-- <div>
                        <img class="w-36" src="{{ Storage::url($product->images->first()?->path) }}" alt="">
                    </div> --}}
                    @if ($product->colors->count() > 0)
                    <div class="mb-3">
                        <h2 class="font-semibold text-gray-900 mb-3">{{ __("Select Color") }}</h2>
                        <div class="flex flex-wrap gap-3">
                            @foreach ($product->colors as $color)
                            <label class="block">
                                <input wire:model.live='color' type="radio" name="color-choice" value="{{  $color->id }}" class="sr-only peer">
                                <span style="background-color: {{ $color->name }}!important"
                                    class="w-8 h-8 rounded-full ring-2 ring-offset-2 ring-gray-200 transition-all hover:ring-gray-300 peer-focus:ring-gray-400 peer-focus:ring-offset-4 peer-checked:ring-gray-900 block cursor-pointer"></span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if ($product->dimensions->count() > 0)
                    <div class="mb-3">
                        <h2 class="font-semibold text-gray-900 mb-3">{{ __("Other options") }}</h2>
                        <div class="flex flex-wrap gap-3">
                            @foreach ($product->dimensions as $dimension)
                            <label class="block">
                                <input wire:model.live='dimension' type="radio" name="dimension"
                                    value="{{ $dimension->id }}" class="sr-only peer">
                                <span
                                    class="px-4 py-2 text-sm font-medium rounded-full bg-gray-100 text-gray-900 hover:bg-gray-200 transition-colors peer-checked:bg-gray-900 peer-checked:text-white block cursor-pointer">
                                    {{ $dimension->value }}
                                </span>
                            </label>
                            @endforeach
                        </div>
                        @error('dimension') <span class="text-red-700 my-2">{{ $message }}</span> @enderror
                    </div>
                    @endif
                    <div class="mb-6" x-data="{ quantity: @entangle('quantity') }">
                        <div class="">
                            <span class="text-md font-bold">{{ __("Quantity") }}</span>
                            <div class="flex items-center border border-gray-300 w-full rounded-md">
                                <button type="button" @click='quantity > 1 ? quantity-- : null' class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden">
                                    -
                                </button>
                                <input type="number" x-model="quantity" class="text-center border-x border-gray-300 py-1 overflow-hidden w-full" />
                                <button type="button" @click="quantity++" class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden">
                                    +
                                </button>
                            </div>
                            @error('quantity') <span class="text-red-700 my-2">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Full name") }}</label>
                        <x-forms.input type="text" wire:model='full_name' placeholder="{{ __('Full name') }}" />
                        @error('full_name') <span class="text-red-700 my-2">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2 mt-2">
                        <div>
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">{{ __("City") }}</label>
                            <x-forms.input type="text" wire:model='city_name' placeholder="{{ __('City') }}" />
                            @error('city_name') <span class="text-red-700 my-2">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Phone") }}</label>
                            <x-forms.input type="tel" wire:model='phone' placeholder="{{ __('Phone') }}" />
                            @error('phone') <span class="text-red-700 my-2">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="grid gap-6 mb-6 md:grid-cols-2 mt-2">
                        <div>
                            <label for="zip_code" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Zip Code") }}</label>
                            <x-forms.input type="text" maxLength="30" wire:model='zip_code' placeholder="{{ __('Zip Code') }}" />
                            @error('zip_code') <span class="text-red-700 my-2">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Email") }}</label>
                            <x-forms.input type="email" maxLength="30" wire:model='email' placeholder="{{ __('Email') }}" />
                            @error('email') <span class="text-red-700 my-2">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <div>
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">{{ __("Address") }}</label>
                        <x-forms.input type="text" maxLength="30" wire:model='address' placeholder="{{ __('Address') }}" />
                        @error('address') <span class="text-red-700 my-2">{{ $message }}</span> @enderror
                    </div>
                    <button type="button" wire:click='save()' class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 my-3 w-full text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0">
                        {{ __("Order Now") }}
                    </button>
                </div>
        </div>
    </div>
</div>
