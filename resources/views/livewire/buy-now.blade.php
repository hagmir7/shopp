
<form class="max-w-7xl md:px-5 grid grid-cols-1 lg:grid-cols-2 gap-2 md:gap-8">
    <div>
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
                    <input wire:model.live='dimension' type="radio" name="dimension" value="{{ $dimension->id }}"
                        class="sr-only peer">
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
        <div class="md:mb-6" x-data="{ quantity: @entangle('quantity') }">
            <div class="">
                <span class="text-md font-bold">{{ __("Quantity") }}</span>
                <div class="flex items-center border border-gray-300 w-full rounded-md">
                    <button type="button" @click='quantity > 1 ? quantity-- : null'
                        class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden">
                        -
                    </button>
                    <input type="number" x-model="quantity"
                        class="text-center border-x border-gray-300 py-1 overflow-hidden w-full" />
                    <button type="button" @click="quantity++"
                        class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden">
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
            <x-forms.textarea type="text" maxLength="100" wire:model='address' placeholder="{{ __('Address') }}" />
            @error('address') <span class="text-red-700 my-2">{{ $message }}</span> @enderror
        </div>
        <button type="button" wire:click='save()' class="w-full mt-4 flex items-center justify-center gap-2 rounded-lg bg-amber-400 px-4 py-3 text-sm font-semibold text-gray-900 shadow-sm transition-all duration-200 hover:bg-amber-500 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 active:translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed mb-4">
            {{ __("Send order") }}
        </button>
    </div>
</form>
