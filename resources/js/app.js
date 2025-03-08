import './bootstrap';
import Alpine from 'alpinejs';
import Splide from '@splidejs/splide';
import focus from '@alpinejs/focus';

// Register the plugin
Alpine.plugin(focus);

// Start Alpine
Alpine.start();

function initSwiper() {
    // Ensure that the sliders exist before trying to initialize them
    const existingMain = document.querySelector('#primary_slider');
    const existingThumbs = document.querySelector('#thumbnail_slider');

    if (existingMain && existingThumbs) {
        // Destroy existing instances if they exist
        if (existingMain.splide) {
            existingMain.splide.destroy();
        }
        if (existingThumbs.splide) {
            existingThumbs.splide.destroy();
        }

        // Initialize new instances
        var main = new Splide('#primary_slider', {
            type: 'loop',
            perPage: 1,
            perMove: 1,
            gap: '1rem',
            direction: "rtl",
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
            direction: "rtl",
            pagination: false,
            cover: false,
            arrows: false,
        });

        main.sync(thumbnails);
        main.mount();
        thumbnails.mount();
    } else {
        // Optionally log or handle errors if sliders are not found
        console.warn('Sliders not found in the DOM');
    }
}

// Re-initialize Swiper when Livewire triggers a page reload
Livewire.on('reloadPage', () => {
    location.reload();
});

// Initialize Swiper once page is ready
document.addEventListener('DOMContentLoaded', () => {
    initSwiper();
});
