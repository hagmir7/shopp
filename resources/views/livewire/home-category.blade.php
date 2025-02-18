<section class="max-w-6xl mx-auto pt-6 mb-4">
    @if ($categories->count())
        {{-- <h1 class="text-xl font-bold text-gray-900 mb-2 px-4">{{ __("Categories list") }}</h1> --}}

        @livewire('category-list')
    @endif
</section>





