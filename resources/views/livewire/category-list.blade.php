<section class="max-w-6xl mx-auto px-4 {{ $categories->count() == 0 ?? 'hidden' }}">
    @switch(app('site')->options['category_layout'])
        @case(1)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach ($categories as $category)
                <x-category.defaul image="{{ Storage::url($category->image) }}" name="{{ $category->name }}"
                    url="{{ route('category.show', $category->slug) }}" products="{{ $category->products->count() }}"
                    description="{{ $category->description }}" />
                @endforeach
            </div>
            @break

        @case(2)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <!-- Headphones Category -->
                @foreach ($categories as $category)
                <x-category.primary image="{{ Storage::url($category->image) }}" name="{{ $category->name }}"
                    url="{{ route('category.show', $category->slug) }}" products="{{ $category->products->count() }}"
                    description="{{ $category->description }}" />

                @endforeach
            </div>
            @break
        @default
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @foreach ($categories as $category)
                <x-category.secondary image="{{ Storage::url($category->image) }}" name="{{ $category->name }}"
                    url="{{ route('category.show', $category->slug) }}" products="{{ $category->products->count() }}"
                    description="{{ $category->description }}" />
                @endforeach
            </div>
    @endswitch
</section>
