<div class="flex flex-col space-y-6 relative">
    <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
        @if ($product->category)
        <div class="flex items-center space-x-2">
            <a href="{{ route('category.show', $product->category->slug) }}" class="text-gray-600">{{ $product->category->name }}</a>
        </div>
        @endif
        @if (auth()->user())
        <a class="top-0 end-0 absolute" href="/admin/products/{{ $product->id }}/edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="text-green-500" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                    <path d="M9.533 11.15A1.82 1.82 0 0 0 9 12.438V15h2.578c.483 0 .947-.192 1.289-.534l7.6-7.604a1.82 1.82 0 0 0 0-2.577l-.751-.751a1.82 1.82 0 0 0-2.578 0z" />
                    <path d="M21 12c0 4.243 0 6.364-1.318 7.682S16.242 21 12 21s-6.364 0-7.682-1.318S3 16.242 3 12s0-6.364 1.318-7.682S7.758 3 12 3" />
                </g>
            </svg>
        </a>
        @endif
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

