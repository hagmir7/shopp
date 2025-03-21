<div class="space-y-4" id="buy-now">
    <p class="text-md bg-orange-200 rounded-md p-2">{{ __("Please enter your information to complete the order.") }}</p>
    @if ($product->colors->count() > 0)
    <div>
        <h2 class="font-semibold text-gray-900 mb-3">{{ __("Select Color") }}</h2>
        <div class="flex flex-wrap gap-3">
            @foreach ($product->colors as $color)
            <div class="relative">
                <label for="color-{{ $color->id }}" class="group">
                    <input wire:model.live='color' type="radio" name="color-choice" id="color-{{ $color->id }}"
                        value="{{ $color->id }}" class="sr-only peer">
                    <span style="background-color: {{ $color->code }}!important"
                        class="w-8 h-8 rounded-full ring-2 ring-offset-2 ring-gray-200 transition-all hover:ring-gray-300 peer-focus:ring-gray-400 peer-focus:ring-offset-4 peer-checked:ring-gray-900 block cursor-pointer"
                        role="presentation" aria-hidden="true"></span>
                    <!-- Tooltip -->
                    <span
                        class="invisible group-hover:visible absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 text-xs text-white bg-gray-900 rounded whitespace-nowrap">
                        {{ $color->name }}
                    </span>
                </label>
            </div>
            @endforeach
        </div>
    </div>
    @endif
  @if ($product->dimensions->count() > 0)
    <div>
        <h2 class="font-semibold text-gray-900 mb-3">{{ __("Other options") }}</h2>
        <div class="flex flex-wrap gap-3">
            @foreach ($product->dimensions as $dimension)
            <div class="relative">
                <label for="dimension-{{ $dimension->id }}" class="group">
                    <input wire:model.live='dimension' type="radio" name="dimension" id="dimension-{{ $dimension->id }}"
                        value="{{ $dimension->id }}" class="sr-only peer">
                    <span
                        class="px-4 py-2 text-sm font-medium rounded-full bg-gray-100 text-gray-900 hover:bg-gray-200 transition-colors peer-checked:bg-gray-900 peer-checked:text-white block cursor-pointer"
                        role="presentation" aria-hidden="true">
                        {{ $dimension->value }}
                    </span>
                    <!-- Tooltip -->
                    <span
                        class="invisible group-hover:visible absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 text-xs text-white bg-gray-900 rounded whitespace-nowrap">
                        {{ $dimension->description ?? $dimension->value }}
                    </span>
                </label>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    <div class="mb-6" x-data="{ quantity: null }"  x-init="quantity = window.Livewire.find('GDOqeJmfmQtFriomcHzc') ? window.Livewire.find('GDOqeJmfmQtFriomcHzc').entangle('quantity') : null">
        <div class="flex items-center w-full input-primary py-2">
            <button @click="if(quantity > 1) quantity--"
                class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden"
                aria-labelledby="temperature low">
                -
            </button>
            <label for="quantity" class="hidden">{{ __("Quantity") }}</label>
            <input type="number" x-model="quantity" min="1" name="quantity" value="{{ $quantity }}" class="w-full text-center border-x border-gray-300 py-1 overflow-hidden" />
            <button @click="quantity++" class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden"
                aria-labelledby="temperature high">
                +
            </button>
        </div>
    </div>
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <input type="text" wire:model="full_name" class="input-primary" placeholder="{{ __("Full name") }}">
            @error('full_name') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
        </div>
        <div>
            <input type="tel" wire:model="phone" class="input-primary" placeholder="{{ __("Phone") }}">
            @error('phone') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
        </div>
    </div>

    {{-- <div>
        <input type="email" wire:model="email" class="input-primary" placeholder="{{  __("Email") }}">
        @error('email') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
    </div> --}}

    <div>
        <input type="text" wire:model="city" class="input-primary mb-3" placeholder="{{ __("City") }}">
        @error('address') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
        <input type="text" wire:model="address" class="input-primary mb-3" placeholder="{{ __("Address") }}">
        @error('city') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror


        {{-- <div class="grid grid-cols-2 gap-4">
            <input type="text" wire:model="city" class="input-primary" placeholder="{{ __("City") }}">
            @error('city') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
            <input type="text" wire:model="zip" class="input-primary" placeholder='{{ __("ZIP Code") }}'>
            @error('zip') <span class="text-red-600 mt-2">{{ $message }}</span> @enderror
        </div> --}}
    </div>

    <button type="submit" wire:click='save()' class="btn btn-primary w-full rounded-md">
        <span wire:loading>
            <svg aria-hidden="true" role="status"
                class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="#E5E7EB" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentColor" />
            </svg>

        </span>
        {{ __("Buy Now") }}
    </button>
</div>
