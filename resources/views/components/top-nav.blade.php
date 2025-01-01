<!-- Top Bar -->
<div class="hidden lg:block bg-[#f3f3f3] border-b-2">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-2 text-sm">
            <div class="flex space-x-4">
                <a href="#" class="hover:text-gray-600">{{ __("About Us") }}</a>
                <a href="#" class="hover:text-gray-600">{{ __("Expert Advice") }}</a>
                <a href="#" class="hover:text-gray-600">{{ __("Help Centre") }}</a>
            </div>
            <div class="flex items-center space-x-4">
                @if (app('site')->phone)
                    <a href="tel:{{ app('site')->phone }}">{{ app('site')->phone }}</a>
                @endif
                <a href="/contact" class="hover:text-gray-600">{{ __("Contact us") }}</a>
            </div>
        </div>
    </div>
</div>

