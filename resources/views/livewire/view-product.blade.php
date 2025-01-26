<div class="flex flex-col space-y-6">
    <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
        <div class="py-1">
            <span class="text-primary text-2xl font-bold">
                 {{ $product->price}} {{ app("site")->currency }}
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

    @livewire('buy-now', ['product' => $product], key($product->id))
</div>
