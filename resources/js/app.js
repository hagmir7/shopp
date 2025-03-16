import './bootstrap';
import Alpine from 'alpinejs';
import Splide from '@splidejs/splide';
import focus from '@alpinejs/focus';

// Register the plugin
Alpine.plugin(focus);

// Start Alpine
Alpine.start();
function initSwiper() {
    const existingMain = document.querySelector('#primary_slider');
    const existingThumbs = document.querySelector('#thumbnail_slider');

    if (!existingMain || !existingThumbs) {
        console.warn('Sliders not found in the DOM');
        return; // Stop execution if sliders do not exist
    }

    // Destroy existing instances if they exist
    if (existingMain.splide) {
        existingMain.splide.destroy();
    }
    if (existingThumbs.splide) {
        existingThumbs.splide.destroy();
    }

    // Initialize Splide
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
}

// Initialize Swiper only when sliders exist
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        if (document.querySelector('#primary_slider') && document.querySelector('#thumbnail_slider')) {
            initSwiper();
        }
    }, 100); // Delay initialization to ensure elements exist
});

Livewire.on('reloadPage', () => {
    setTimeout(() => {
        if (document.querySelector('#primary_slider') && document.querySelector('#thumbnail_slider')) {
            initSwiper();
        }
    }, 100);
    lazyLoading();
});


function initObserver() {
    let observer; // Declare observer in the outer scope

    observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const wrapper = entry.target;
                const img = wrapper.querySelector('.lazy-image');
                const errorMsg = wrapper.querySelector('.error-message');

                if (img && !img.src && img.dataset.src) {
                    img.src = img.dataset.src;

                    img.onload = () => {
                        wrapper.classList.remove('loading');
                        img.classList.add('loaded');
                        observer.unobserve(wrapper);  // ✅ Ensure observer is referenced correctly
                    };

                    img.onerror = () => {
                        wrapper.classList.remove('loading');
                        if (errorMsg) errorMsg.style.display = 'block';
                        observer.unobserve(wrapper);  // ✅ Prevent infinite observing
                    };
                }
            }
        });
    }, {
        root: null,
        rootMargin: '50px 0px 50px 0px',
        threshold: 0
    });

    return observer;  // ✅ Return observer properly
}

function lazyLoading() {
    const observer = initObserver();  // ✅ Get observer instance

    const wrappers = document.querySelectorAll('.image-wrapper:not(.loaded)');

    wrappers.forEach(wrapper => {
        const rect = wrapper.getBoundingClientRect();
        const isInViewport = (
            rect.top >= -50 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight + 50) &&
            rect.right <= window.innerWidth
        );

        const img = wrapper.querySelector('.lazy-image');

        if (isInViewport && img && !img.src && img.dataset.src) {
            img.src = img.dataset.src;

            img.onload = () => {
                wrapper.classList.remove('loading');
                img.classList.add('loaded');
            };

            img.onerror = () => {
                wrapper.classList.remove('loading');
                const errorMsg = wrapper.querySelector('.error-message');
                if (errorMsg) errorMsg.style.display = 'block';
            };
        } else {
            observer.observe(wrapper);  // ✅ Use observer properly
        }
    });
}


// Initial load
document.addEventListener('livewire:init', () => {
    setTimeout(() => {
        lazyLoading();
    }, 100);
});
