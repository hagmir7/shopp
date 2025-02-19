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

    @if ($product->buy_now)
        @livewire('buy-now', ['product' => $product], key($product->id))
    @endif
</div>
