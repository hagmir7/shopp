<section class="max-w-6xl mx-auto px-4 pt-6 mb-4">
    <h1 class="text-xl font-bold text-gray-900 mb-2">{{ __("Categories list") }}</h1>

    {{-- <p class="text-gray-600 mb-4">
        Explore Floor Warehouse's premium selection of Solid & Engineered Wood, Luxury Vinyl Tiles, and Laminate
        Flooring, sourced from top suppliers to ensure quality and innovation at unbeatable prices. Discover your
        perfect floor and order free samples today!
    </p> --}}

    {{-- <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @foreach ($categories as $category)
            <x-category.defaul
                image="{{ Storage::url($category->image) }}"
                name="{{ $category->name }}"
                url="{{ route('category.show', $category->slug) }}"
                products="{{ $category->products->count() }}"
                description="{{ $category->description }}"

            />
        @endforeach
    </div> --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        <!-- Headphones Category -->
        @foreach ($categories as $category)
        <x-category.primary
            image="{{ Storage::url($category->image) }}"
            name="{{ $category->name }}"
            url="{{ route('category.show', $category->slug) }}"
            products="{{ $category->products->count() }}"
            description="{{ $category->description }}"
         />

        @endforeach
    </div>

    {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($categories as $category)
        <x-category.secondary
            image="{{ Storage::url($category->image) }}"
            name="{{ $category->name }}"
            url="{{ route('category.show', $category->slug) }}"
            products="{{ $category->products->count() }}"
            description="{{ $category->description }}"
         />
         @endforeach
    </div> --}}
</section>





