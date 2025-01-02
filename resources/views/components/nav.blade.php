<!-- Main Navigation -->
<nav class="bg-[#fbfaf7] border-b-2 border-[#e0b15e]">
    <div class="container mx-auto flex flex-wrap items-center justify-between px-4 py-4">
        <!-- Mobile menu button -->
        <x-mobile-menu />

        <!-- Logo -->
        <a href="/" class="flex items-center">
            <img src="{{ Storage::url(app("site")->logo) }}" alt="{{  app("site")->name }}" class="h-12">
        </a>
        <!-- Search Bar -->
        {{-- @livewire('product-search') --}}
        <livewire:product-search />
        {{-- @livewire('component', ['user' => $user], key($user->id)) --}}


        <!-- Icons -->
        <div class="items-center space-x-4 hidden lg:flex" >
            <a href="#" class="hover:text-gray-600 p-2 rounded-full bg-[#efeeeb]">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M7.75 3.5C5.127 3.5 3 5.76 3 8.547C3 14.125 12 20.5 12 20.5s9-6.375 9-11.953C21 5.094 18.873 3.5 16.25 3.5c-1.86 0-3.47 1.136-4.25 2.79c-.78-1.654-2.39-2.79-4.25-2.79" />
                </svg>
            </a>

            <a href="#" class="hover:text-gray-600 p-2 rounded-full bg-[#efeeeb]">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M15 7.5a3 3 0 1 1-6 0a3 3 0 0 1 6 0m4.5 13c-.475-9.333-14.525-9.333-15 0" />
                </svg>
            </a>

            <livewire:side-cart>
        </div>


        {{-- Mobile cart --}}
        <div class="items-center space-x-4 flex lg:hidden">
            <a href="#" class="hover:bg-amber-800 bg-amber-950 p-2 rounded-full  relative text-white duration-200">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3" />
                </svg>
                <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                    20
                </div>
            </a>
        </div>
    </div>

    <!-- Categories Menu -->
    <div class="hidden w-full lg:block" id="navbar-default">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <ul class="flex flex-col lg:flex-row space-x-10 py-2 text-sm font-medium">
                <a href="#" class="inline-flex cursor-pointer py-2 hover:text-gray-600 text-lg gap-2 items-center">
                    Home
                </a>
            <x-nav.dropdown name="Electronic" :items="[
                [
                    'name' => 'Home',
                    'url' => '/'
                ],
                [
                    'name' => 'About',
                    'url' => '/about'
                ]
            ]" />

            <x-nav.dropdown name="Categories" :items="[
                [
                    'name' => 'Electronic',
                    'url' => '/'
                ],
                [
                    'name' => 'Home',
                    'url' => '/about'
                ]
            ]" />

            </ul>

            <div>
                <a href="" class="rounded-pill text-gray-900 bg-[#e0b15e] py-2 px-4 rounded-full text-sm font-semibold hover:text-white"> We'll Beat Any Price!</a>
            </div>
        </div>
    </div>
</nav>
