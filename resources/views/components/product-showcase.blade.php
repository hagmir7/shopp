<div class="thumbnail_slider">
    <!-- Primary Slider -->
    <div id="primary_slider" class="splide" aria-live="polite">
        <!-- Added splide class -->
        <div class="splide__track">
            <ul class="splide__list" role="menu">
                @foreach ($images as $image)
                <li class="splide__slide" role="none">
                    <img class="h-auto" role="menuitem" src="{{ Storage::url($image->path) }}" alt="{{ $name }} - Image {{ $loop->iteration }}">
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Thumbnail Slider -->
    <div id="thumbnail_slider" class="splide" aria-label="Thumbnail Slider">
        @if ($images->count() > 1)
        <!-- Added splide class -->
        <div class="splide__track">
            <ul class="splide__list" role="menu">
                @foreach ($images as $image)
                <li class="splide__slide border border-1 border-gray-500" role="none">
                    <img class="object-contain" style="border: 1.5px solid #8080804f;" src="{{ Storage::url($image->path) }}" alt="{{ $name }} - Thumbnail {{ $loop->iteration }}" role="menuitem">
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
