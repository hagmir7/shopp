<div x-data="{modalIsOpen: false}" class="w-full">
    <button @click="modalIsOpen = true" type="button" class="w-full flex items-center justify-center gap-2 rounded-pill text-gray-900 bg-[#e0b15e] py-2 px-4 rounded-full text-sm font-semibold hover:text-gray-600">
        <span>{{ __("Buy Now") }}</span>
    </button>
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
        @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false"
        class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
        role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen"
            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
            x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
            class="flex flex-col gap-4 overflow-hidden rounded-md border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
            <!-- Dialog Header -->
            <div
                class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">
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
            <form class="max-w-7xl px-5">
                <div>
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Full name") }}</label>
                    <input type="text" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __("Your name") }}" required />
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-2">
                    <div>
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("City") }}</label>
                        <input type="text" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="{{ __("City") }}" required />
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Phone number") }}</label>
                        <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="123-45-678" required />
                    </div>
                </div>
                <button type="button" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-4 py-2 my-3 w-full text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0">
                    {{ __("Order Now") }}
                </button>
        </div>
    </div>
</div>
