<div class="thumbnail_slider">
    <!-- Primary Slider -->
    <div id="primary_slider" class="splide">
        <!-- Added splide class -->
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($images as $image)
                    <li class="splide__slide">
                        <img class="h-auto md:h-[400px]" src="{{ Storage::url($image->path) }}">
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
                <li class="splide__slide" style="background-size: contain!important;">
                    <img src="{{ Storage::url($image->path) }}">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
