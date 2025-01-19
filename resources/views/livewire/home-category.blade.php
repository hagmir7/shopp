<section class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-xl font-bold text-gray-900 mb-2">{{ __("Browse Categories") }}</h1>

    <p class="text-gray-600 mb-4">
        Explore Floor Warehouse's premium selection of Solid & Engineered Wood, Luxury Vinyl Tiles, and Laminate
        Flooring, sourced from top suppliers to ensure quality and innovation at unbeatable prices. Discover your
        perfect floor and order free samples today!
    </p>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @foreach (app("site")->categories as $category)
            <x-category-item
                image="{{ Storage::url($category->image) }}"
                name="{{ $category->name }}"
                url="{{ route('category.show', $category->slug) }}"
            />
        @endforeach
    </div>
</section>
