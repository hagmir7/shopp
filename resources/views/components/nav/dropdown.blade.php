

<li class="z-30">
    <div x-data="{ isOpen: false, openedWithKeyboard: false, leaveTimeout: null }"
        @mouseleave.prevent="leaveTimeout = setTimeout(() => { isOpen = false }, 250)"
        @mouseenter="leaveTimeout ? clearTimeout(leaveTimeout) : true"
        @keydown.esc.prevent="isOpen = false, openedWithKeyboard = false"
        @click.outside="isOpen = false, openedWithKeyboard = false" class="relative">
        <!-- Toggle Button -->
        <button type="button" @mouseover="isOpen = true" @keydown.space.prevent="openedWithKeyboard = true"
            @keydown.enter.prevent="openedWithKeyboard = true" @keydown.down.prevent="openedWithKeyboard = true"
            class="inline-flex cursor-pointer py-2 hover:text-gray-600 gap-2 items-center text-[17px]"
            :class="isOpen || openedWithKeyboard ? 'text-neutral-900' : 'text-neutral-600'"
            :aria-expanded="isOpen || openedWithKeyboard" aria-haspopup="true">
            {{ $name }}
            <svg aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" class="h-4 w-4 rotate-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
        <!-- Dropdown Menu -->
        <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard"
            @click.outside="isOpen = false, openedWithKeyboard = false" @keydown.down.prevent="$focus.wrap().next()"
            @keydown.up.prevent="$focus.wrap().previous()"
            class="absolute top-12 left-0 flex w-full min-w-96 flex-col overflow-hidden rounded-md shadow-lg border-t-4 border-yellow-600 bg-gray-100 py-1.5"
            role="menu">
            @foreach ($items as $item)
            <x-nav.dropdown-item name="{{ $item['name'] }}" url="{{ $item['url'] }}" />
            @endforeach
        </div>
    </div>
</li>
