<!-- Main Navigation -->
<nav class="bg-[#fbfaf7] border-b-2 border-primary">
    <div class="container mx-auto flex flex-wrap items-center justify-between px-4 py-4" x-data="{}">
        <!-- Mobile menu button -->
        <x-mobile-menu />

        <!-- Logo -->
        <a href="/" class="flex items-center">
            @if (app("site")->logo)
                <img src="{{ Storage::url(app("site")->logo) }}" alt="{{ app("site")->name }}" class="w-32 md:h-12 md:w-auto ">
            @else
                <div class="text-3xl font-bold">{{ app("site")->name }}</div>
            @endif
        </a>
        <!-- Search Bar -->
        <livewire:product-search />
        <!-- Icons -->
        <div class="items-center space-x-4 hidden lg:flex">
            <button class="hover:text-gray-600 border-primary border-2 p-2 rounded-full bg-[#efeeeb] me-3" aria-label="Open love items">
                <svg class="w-6 h-6 text-primary" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M7.75 3.5C5.127 3.5 3 5.76 3 8.547C3 14.125 12 20.5 12 20.5s9-6.375 9-11.953C21 5.094 18.873 3.5 16.25 3.5c-1.86 0-3.47 1.136-4.25 2.79c-.78-1.654-2.39-2.79-4.25-2.79" />
                </svg>
            </button>

            @auth
                <a href="/profile" class="hover:text-gray-600 p-2 rounded-full bg-[#efeeeb] border-primary border-2">
                    <svg class="w-6 h-6 text-primary" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M15 7.5a3 3 0 1 1-6 0a3 3 0 0 1 6 0m4.5 13c-.475-9.333-14.525-9.333-15 0" />
                    </svg>
                </a>
            @endauth

            @guest
                <x-nav-profile-icon />
            @endguest
         @livewire('side-cart')
        </div>


        {{-- Mobile cart --}}
        <div>
            <!-- Added x-data here -->
            <div class="items-center space-x-4 flex lg:hidden">
                <a href="{{ route("cart") }}" class="btn btn-primary p-2 px-1 overflow-visible rounded-full relative duration-200">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3" />
                    </svg>
                    <div
                        class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2">
                        @livewire('cart-counter')
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Categories Menu -->
    <div class="hidden w-full lg:block" id="navbar-default">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <ul class="flex flex-col lg:flex-row gap-5 py-2 text-sm font-medium">
                <li>
                    <a href="/"
                        class="inline-flex cursor-pointer py-2 hover:text-gray-600 items-center text-[17px] text-secondary">
                        {{ __("Home") }}
                    </a>
                </li>
                @foreach (app('site')->urls->where('header', true)->load('children')->sortBy('order')->all() as $item)
                    @if (count($item->children) == 0)
                    <li>
                        <a href="{{ $item->path }}" class="inline-flex cursor-pointer py-2 hover:text-gray-600 items-center text-[17px] text-secondary">
                            {{ $item->name }}
                        </a>
                    </li>
                    @else
                    <x-nav.dropdown name="{{ $item->name }}" :items="$item->children->map(function($child) {
                            return [
                                'name' => $child->name,
                                'url' => $child->path
                            ];
                        })->toArray()" />
                    @endif
                @endforeach

            </ul>
            <div>
                <a href="{{ route('contact') }}" class="btn btn-primary rounded-full btn-sm flex gap-2">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M3.464 16.828C2 15.657 2 14.771 2 11s0-5.657 1.464-6.828C4.93 3 7.286 3 12 3s7.071 0 8.535 1.172S22 7.229 22 11s0 4.657-1.465 5.828C19.072 18 16.714 18 12 18c-2.51 0-3.8 1.738-6 3v-3.212c-1.094-.163-1.899-.45-2.536-.96" />
                        </svg>
                    </span>
                    <span>{{ __("Contact Us") }}</span>
                </a>
            </div>
        </div>
    </div>
</nav>
