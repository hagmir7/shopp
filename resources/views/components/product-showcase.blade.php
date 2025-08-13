<div class="thumbnail_slider">
    <!-- Primary Slider -->
    <div id="primary_slider" class="splide">
        <!-- Added splide class -->
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($images->sortBy('order') as $image)
                <li class="splide__slide">
                    <img class="h-auto" src="{{ Storage::url($image->path) }}" alt="{{ $name }} - Image {{ $loop->iteration }}">
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Thumbnail Slider -->
    <div id="thumbnail_slider" class="splide">
        @if ($images->count() > 1)
        <!-- Added splide class -->
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($images as $image)
                <li class="splide__slide border border-1 border-gray-500">
                    <img class="object-contain" style="border: 1.5px solid #8080804f;"
                        src="{{ Storage::url($image->path) }}" alt="{{ $name }} - Thumbnail {{ $loop->iteration }}">
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
