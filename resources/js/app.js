import './bootstrap';
import Alpine from 'alpinejs'
import Splide from '@splidejs/splide';
import focus from '@alpinejs/focus'

// Register the plugin
Alpine.plugin(focus)

// Start Alpine
Alpine.start()



function initSwiper() {
    // Destroy existing instances if they exist
    const existingMain = document.querySelector('#primary_slider');
    const existingThumbs = document.querySelector('#thumbnail_slider');

    if (existingMain?.splide) {
        existingMain.splide.destroy();
    }
    if (existingThumbs?.splide) {
        existingThumbs.splide.destroy();
    }

    // Initialize new instances
    var main = new Splide('#primary_slider', {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        gap: '1rem',
        pagination: false,
        arrows: true,
    });

    var thumbnails = new Splide('#thumbnail_slider', {
        rewind: true,
        fixedWidth: 100,
        fixedHeight: "100%",
        isNavigation: true,
        gap: 10,
        focus: 'center',
        pagination: false,
        cover: false,
        arrows: false,
    });

    main.sync(thumbnails);
    main.mount();
    thumbnails.mount();
}

initSwiper();

