<footer class="bg-gray-900 text-gray-200 py-10 px-4">
    <!-- Logo and Social Media Section -->
    <div class="max-w-7xl mx-auto mb-8 grid grid-cols-1 md:grid-cols-2">
        <div class="flex items-center">
            @if (app("site")->logo)
            <img src="{{ Storage::url(app('site')->dark_logo) }}" alt="{{ app('site')->name }}" class="h-14">
            @else
            <div class="text-3xl font-bold">{{ app('site')->name }}</div>
            @endif
        </div>

        <!-- Social Media Links -->
        <div class="flex items-center space-x-4 justify-start md:justify-end mt-4 md:mt-0">
            @foreach (app("site")->media as $item)
            <a style="background-color: {{ $item->color }}" target="_blank" href="{{ $item->pivot->url }}"
                class="w-8 h-8 rounded-full flex items-center justify-center text-white shadow-md hover:opacity-80 transition">
                <span class="text-sm">{!! $item->icon !!}</span>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Navigation Links -->
    <div class="w-full max-w-screen-xl mx-auto md:py-8">
        <nav class="sm:flex sm:items-center sm:justify-between">
            <ul class="flex flex-wrap items-center text-md font-medium text-gray-400 sm:mb-0 gap-4">
                <li>
                    <a href="/" class="hover:underline hover:text-gray-100">{{ __("Home") }}</a>
                </li>
                <li>
                    <a href="/contact" class="hover:underline hover:text-gray-100">{{ __("Contact Us") }}</a>
                </li>
                @foreach (app('site')->urls->where('footer') as $item)
                <li>
                    <a href="{{ $item->path }}" class="hover:underline hover:text-gray-100">{{ $item->name }}</a>
                </li>
                @endforeach
            </ul>
        </nav>
    </div>

    <!-- Footer Bottom -->
    <div class="max-w-7xl mx-auto border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
        <div class="text-md text-gray-400 mb-4 md:mb-0">
            20{{ now()->format('y') }} © {{ app('site')->name }}. {{ __("All rights reserved") }}.
            <br>
            {{ app("site")?->address }}
        </div>

        <!-- Payment Methods -->
        <div class="flex space-x-2">
            <img src="https://floorwarehouse.co.uk/wp-content/themes/woodmart/images/payments.png" alt="Payment methods"
                class="h-6 opacity-90">
        </div>
    </div>
</footer>
