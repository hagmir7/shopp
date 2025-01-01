<div class="flex-1 max-w-xl mx-4 hidden lg:block">
    <div class="relative">
        <button class="absolute left-3 top-1/2 -translate-y-1/2">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>

        <input type="text" wire:model.debounce.300ms="search" placeholder="{{ __(" Search for products") }}"  class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-200">
        <div class="absolute z-50 w-full mt-1 bg-white rounded-lg shadow-lg border border-gray-200 max-h-96 overflow-y-auto">
            @if($search && strlen($search) >= 2)
            @if(count($products) > 0)
            @foreach($products as $product)
            <a href="{{ route('products.show', $product) }}"
                class="flex items-center p-4 hover:bg-gray-50 border-b border-gray-100 last:border-0">
                <img src="" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">
                <div class="ml-4">
                    <h4 class="font-medium text-gray-900">{{ $product->name }}</h4>
                    <div class="flex items-center mt-1">
                        <span class="text-lg font-bold text-orange-500">£{{ number_format($product->price, 2) }}</span>
                        <span class="ml-2 text-sm text-gray-500">per 10</span>
                    </div>
                </div>
            </a>
            @endforeach
            @else
            <div class="p-4 text-center text-gray-500">
                No products found
            </div>
            @endif
            @endif
        </div>
    </div>

</div>
