<div class="thumbnail_slider">
    <!-- Primary Slider -->
    <div id="primary_slider" class="splide">
        <!-- Added splide class -->
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($images as $image)
                    <li class="splide__slide">
                        <img src="{{ Storage::url($image->path) }}">
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Thumbnail Slider -->
    <div id="thumbnail_slider" class="splide">
        <!-- Added splide class -->
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($images as $image)
                <li class="splide__slide">
                    <img src="{{ Storage::url($image->path) }}">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
