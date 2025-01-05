<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- Product Card 1 -->
    {{-- <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <div class="relative">
            <img src="https://floorwarehouse.co.uk/wp-content/uploads/2024/04/deep-grey-oak-plank-brushed-oiled-150mm-x-14mm-engineered-wooden-flooring-350x400.jpg"
                alt="Wooden Flooring" class="w-full h-48 md:h-64 object-cover">
            <span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                SALE
            </span>
        </div>
        <div class="p-2">
            <h3 class="text-md md:text-lg font-bold text-gray-900 mb-2">Natural Oak Laminate Flooring</h3>
            <div class="flex items-center mb-4">
                <span class="text-2xl font-bold text-gray-900">24.99MAD</span>
                <span class="ml-2 line-through text-gray-400">£29.99</span>
            </div>
            <button
                class="rounded-pill w-full text-gray-900 bg-[#e0b15e] py-2 px-4 rounded-full text-sm font-semibold hover:text-white bg-opacity-50">
                Add to Cart
            </button>
        </div>
    </div> --}}

    @foreach ($products as $product)
    <div class="bg-white rounded-lg shadow-sm overflow-hidden transition-shadow duration-300">
        <div class="relative">
            <a href="{{ route('product.show', $product->slug) }}">
                <img src="{{ Storage::url($product->images->first()->path) }}" alt="{{ $product->name }}" class="w-full h-48 md:h-64 object-cover">
            </a>
            @if ($product->discount && ($product->discount > 0))
                <span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $product->discount }}% {{ __("OFF") }}
                </span>
            @endif
        </div>
        <div class="p-2">
            <a href="{{ route('product.show', $product->slug) }}">
                <h3 class="text-md md:text-lg font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
            </a>
            <div class="space-x-1 flex">

                <svg class="w-5 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 14 14">
                    <path
                        d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                    </path>
                </svg>
                <svg class="w-5 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 14 14">
                    <path
                        d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                    </path>
                </svg>
                <svg class="w-5 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 14 14">
                    <path
                        d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                    </path>
                </svg>
                <svg class="w-5 mx-px fill-current text-orange-600" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 14 14">
                    <path
                        d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                    </path>
                </svg>
                <svg class="w-5 mx-px fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 14 14">
                    <path
                        d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z">
                    </path>
                </svg>
            </div>
            <div class="mt-4 flex items-center justify-between">
                <p class="text-2xl font-extrabold leading-tight text-gray-900 flex items-center">
                    <span>{{ app("site")->currency }}&#xa0;</span>
                    <span>{{ intval($product->price) }}</span>
                </p>
                <button type="button" class="rounded-pill text-gray-900 bg-[#e0b15e] py-2 px-5 rounded-full text-sm font-semibold hover:text-white bg-opacity-50 flex items-center justify-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ms-2 me-2 h-5 w-5" viewBox="0 0 512 512">
                        <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                            d="M68.4 192A20.38 20.38 0 0 0 48 212.2a17.9 17.9 0 0 0 .8 5.5L100.5 400a40.46 40.46 0 0 0 39.1 29.5h232.8a40.88 40.88 0 0 0 39.3-29.5l51.7-182.3l.6-5.5a20.38 20.38 0 0 0-20.4-20.2zm193.32 160.07A42.07 42.07 0 1 1 304 310a42.27 42.27 0 0 1-42.28 42.07Z" />
                        <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="m160 192l96-128l96 128" />
                    </svg>
                    Add to cart
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>
