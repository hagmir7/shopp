<div class="flex flex-col space-y-6">
    <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
        <p class="mt-2 text-gray-600">{{ $product->description }}</p>
    </div>
    @if ($product->colors->count() > 0)
    <div>
        <h2 class="font-semibold text-gray-900 mb-3">{{ __("Select Color") }}</h2>
        <div class="flex flex-wrap gap-3">
            @foreach ($product->colors as $color)
            <label class="block">
                <input wire:model.live='color' type="radio" name="color-choice" value="{{  $color->id }}"
                    class="sr-only peer">
                <span style="background-color: {{ $color->name }}!important"
                    class="w-8 h-8 rounded-full ring-2 ring-offset-2 ring-gray-200 transition-all hover:ring-gray-300 peer-focus:ring-gray-400 peer-focus:ring-offset-4 peer-checked:ring-gray-900 block cursor-pointer"></span>
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
    </div>
    @endif
    <div>
        <div class="mb-6">
            <div class="flex justify-between items-center gap-4">
                <span class="text-md font-bold">{{ __("Price") }}</span>
                <div>
                    <span class="text-red-500 text-xl font-bold">
                        {{ app("site")->currency }} {{ $product->price}}
                    </span>
                </div>
            </div>
        </div>

        <div class="mb-6" x-data="{ quantity: @entangle('quantity') }">
            <div class="flex justify-between items-center gap-4">
                <span class="text-md font-bold">{{ __("Quantity") }}</span>
                <div class="flex items-center border border-gray-300 rounded-md">
                    <button @click='quantity > 1 ? quantity-- : null' class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden">
                        -
                    </button>
                    <input type="number" x-model="quantity" class="w-16 text-center border-x border-gray-300 py-1 overflow-hidden" />
                    <button @click="quantity++" class="px-4 py-1 text-gray-600 hover:bg-gray-100 text-xl font-bold overflow-hidden">
                        +
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            {{-- Buy model --}}
            <div x-data="{modalIsOpen: false}" class="w-full">
                <button @click="modalIsOpen = true" type="button"
                    class="w-full flex items-center justify-center gap-2 rounded-lg bg-amber-400 px-4 py-3 text-sm font-semibold text-gray-900 shadow-sm transition-all duration-200 hover:bg-amber-500 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 active:translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed"
                    :aria-expanded="modalIsOpen" :aria-controls="modalId">
                    <span class="relative">
                        {{ __("Buy Now") }}
                        <span class="absolute -right-1 -top-1 flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-600 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                        </span>
                    </span>
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
                        @livewire('buy-now', ['product' => $product], key($product->id))
                    </div>
                </div>
            </div>

            <button wire:click='add()' type="button" class="flex items-center justify-center gap-2 text-[#a17933] border-2 border-[#e0b15e] py-2 px-4 rounded-md text-sm font-semibold hover:text-gray-600">
                <svg wire:loading.remove wire:target="add" class="stroke-[#a17933] transition-all duration-500 group-hover:red-red-600" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7394 17.875C10.7394 18.6344 10.1062 19.25 9.32511 19.25C8.54402 19.25 7.91083 18.6344 7.91083 17.875M16.3965 17.875C16.3965 18.6344 15.7633 19.25 14.9823 19.25C14.2012 19.25 13.568 18.6344 13.568 17.875M4.1394 5.5L5.46568 12.5908C5.73339 14.0221 5.86724 14.7377 6.37649 15.1605C6.88573 15.5833 7.61377 15.5833 9.06984 15.5833H15.2379C16.6941 15.5833 17.4222 15.5833 17.9314 15.1605C18.4407 14.7376 18.5745 14.0219 18.8421 12.5906L19.3564 9.84059C19.7324 7.82973 19.9203 6.8243 19.3705 6.16215C18.8207 5.5 17.7979 5.5 15.7522 5.5H4.1394ZM4.1394 5.5L3.66797 2.75" stroke="" stroke-width="1.6" stroke-linecap="round">
                    </path>
                </svg>
                <svg wire:loading wire:target="add" aria-hidden="true" class="stroke-white transition-all duration-500 group-hover:red-red-600 [animation:spin_0.5s_linear_infinite] fill-white" width="22" height="22" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span>{{ __("Add to Cart") }}</span>
            </button>
        </div>
    </div>
</div>
