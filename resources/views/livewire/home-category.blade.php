<div>
    @php
    $showDesktop = data_get(app("site"), 'options.home_category') && $categories?->count();
    $showMobile = data_get(app("site"), 'options.home_category_mobile') && $categories?->count();
    @endphp

    @if($showDesktop)
    <section class="max-w-6xl mx-auto pt-6 mb-4 hidden md:block">
        @livewire('category-list')
    </section>
    @elseif($showMobile)
    <section class="max-w-6xl mx-auto pt-6 mb-4 block md:hidden">
        @livewire('category-list')
    </section>
    @endif
</div>
