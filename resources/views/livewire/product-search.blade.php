<div class="flex-1 max-w-xl mx-4 hidden lg:block">
    <div class="relative">
        <button class="absolute left-3 top-1/2 -translate-y-1/2">
            <svg wire:loading.remove class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <div wire:loading role="status">
                <svg aria-hidden="true"
                    class="w-6 h-6 mt-2 text-gray-500 [animation:spin_0.5s_linear_infinite] dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </button>
        <input type="text" wire:model.live="search" placeholder="{{ __('Search for products') }}" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-200">
        @if (count($results) > 0)
        <div class="absolute z-50 w-full mt-1 bg-white rounded-lg shadow-lg border border-gray-200 max-h-96 overflow-y-auto">
            @foreach($results as $result)
            <a href="{{ route('product.show', $result->slug) }}" class="flex items-center p-4 hover:bg-gray-50 border-b border-gray-100 last:border-0">
                <img src="{{ Storage::url($result->images->first()?->path) }}" alt="{{ $result->name }}" class="w-16 h-16 object-cover rounded">
                <div class="ml-4">
                    <h4 class="font-medium text-gray-900">{{ $result->name }}</h4>
                    <div class="flex items-center mt-1">
                        <span class="text-lg font-bold text-orange-500">
                            {{ app("site")->currency }}{{ number_format($result->price, 2) }}
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @endif

    </div>
</div>
