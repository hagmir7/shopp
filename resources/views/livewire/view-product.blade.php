<div class="flex flex-col space-y-6">
    <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
        <div class="py-1">
            <span class="text-red-500 text-xl font-bold">
                {{ app("site")->currency }} {{ $product->price}}
            </span>
        </div>
        <p class="mt-2 text-gray-600">{{ $product->description }}</p>
    </div>
    @if ($product->colors->count() > 0)
    <div>
        <h2 class="font-semibold text-gray-900 mb-3">{{ __("Select Color") }}</h2>
        <div class="flex flex-wrap gap-3">
            @foreach ($product->colors as $color)
                <input wire:model.live='color' type="radio" name="color-choice" value="{{ $color->id }}" class="sr-only peer">
                <span style="background-color: {{ $color->name }}!important" class="w-8 h-8 rounded-full ring-2 ring-offset-2 ring-gray-200 transition-all hover:ring-gray-300 peer-focus:ring-gray-400 peer-focus:ring-offset-4 peer-checked:ring-gray-900 block cursor-pointer"></span>
            </label>
            @endforeach
        </div>
    </div>
    @endif
    @if ($product->dimensions->count() > 0)
    <div>
        <h2 class="font-semibold text-gray-900 mb-3">{{ __("Other options") }}</h2>
        <div class="flex flex-wrap gap-3">
            @foreach ($product->dimensions as $dimension)
                <input wire:model.live='dimension' type="radio" name="dimension" value="{{ $dimension->id }}"
                    class="sr-only peer">
                <span
                    class="px-4 py-2 text-sm font-medium rounded-full bg-gray-100 text-gray-900 hover:bg-gray-200 transition-colors peer-checked:bg-gray-900 peer-checked:text-white block cursor-pointer">
                    {{ $dimension->value }}
                </span>
            </label>
            @endforeach
        </div>
    </div>
    @endif

    <div class="space-y-4">
        <div class="mb-6" x-data="{ quantity: @entangle('quantity') }">
            <div class="flex items-cente w-full input-primary py-2">
                <button @click='quantity > 1 ? quantity-- : null'
                    class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden">
                    -
                </button>
                <input type="number" x-model="quantity" class="w-full text-center border-x border-gray-300 py-1 overflow-hidden" />
                <button @click="quantity++" class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden">
                    +
                </button>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <input type="text" wire:model="full_name" class="input-primary" placeholder="{{ __("Full name") }}">
            </div>
            <div>
                <input type="tel" wire:model="phone" class="input-primary" placeholder="{{ __("Phone") }}">
            </div>
        </div>

        <div>
            <input type="email" wire:model="email" class="input-primary" placeholder="{{  __("Email") }}">
        </div>

        <div>
            <input type="text" wire:model="address" class="input-primary mb-3" placeholder="{{ __("Street Address") }}">
            <div class="grid grid-cols-2 gap-4">
                <input type="text" wire:model="city" class="input-primary" placeholder="{{ __("City") }}">
                <input type="text" wire:model="zip" class="input-primary" placeholder="{{ __("ZIP Code") }}">
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors">
            Buy Now
        </button>
    </div>
</div>
