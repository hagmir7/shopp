<!-- Top Bar -->
<div class="hidden lg:block bg-[#f3f3f3] border-b-2">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-2 text-sm w-full">
            <div class="flex gap-3">
                @php
                $topNavItems = app('site')->urls->where('top_nav', true)->sortBy('created_at');
                @endphp

                @foreach ($topNavItems as $item)
                <a href="{{ $item->path }}" class="hover:text-gray-600 text-secondary">
                    {{ $item->name }}
                </a>
                @endforeach
                <a href="{{ url('/contact') }}" class="hover:text-gray-600 text-secondary">
                    {{ __('Contact Us') }}
                </a>
            </div>
            <div class="flex items-center gap-4 text-secondary">
                @if (!empty(app('site')->phone))
                <a dir="auto" href="tel:{{ app('site')->phone }}">
                    {{ app('site')->phone }}
                </a>
                @endif

                @if (!empty(app('site')->email))
                <a href="mailto:{{ app('site')->email }}">
                    {{ app('site')->email }}
                </a>
                @endif
            </div>

        </div>
    </div>
</div>
