import './bootstrap';
import Alpine from 'alpinejs'
import Splide from '@splidejs/splide';
import focus from '@alpinejs/focus'

// Register the plugin
Alpine.plugin(focus)

// Start Alpine
Alpine.start()


document.addEventListener('DOMContentLoaded', function () {
    var main = new Splide('#primary_slider', {
        type: 'loop',
        perPage: 1,
        // direction: "rtl",
        perMove: 1,
        gap: '1rem',
        pagination: false,
        arrows: true,
    });

    var thumbnails = new Splide('#thumbnail_slider', {
        rewind: true,
        fixedWidth: 100,
        fixedHeight: 60,
        isNavigation: true,
        // direction: "rtl",
        gap: 10,
        focus: 'center',
        pagination: false,
        cover: true,
        arrows: false,
    });

    main.sync(thumbnails);
    main.mount();
    thumbnails.mount();
});
