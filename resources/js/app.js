import './bootstrap';
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
Livewire.start()
import Splide from '@splidejs/splide';


function initSwiper() {
    const existingMain = document.querySelector('#primary_slider');
    const existingThumbs = document.querySelector('#thumbnail_slider');

    if (!existingMain || !existingThumbs) {
        console.warn('Sliders not found in the DOM');
        return;
    }

    if (existingMain.splide) {
        existingMain.splide.destroy();
    }
    if (existingThumbs.splide) {
        existingThumbs.splide.destroy();
    }

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

document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        if (document.querySelector('#primary_slider') && document.querySelector('#thumbnail_slider')) {
            initSwiper();
        }
    }, 100);
});

// ✅ UNIFIED LAZY LOADING FUNCTION
function lazyLoading() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const wrapper = entry.target;
                const img = wrapper.querySelector('.lazy-image');
                const errorMsg = wrapper.querySelector('.error-message');

                if (img && !img.src && img.dataset.src) {
                    img.src = img.dataset.src;

                    img.onload = () => {
                        wrapper.classList.remove('loading');
                        wrapper.classList.add('loaded'); // ✅ Add loaded class
                        img.classList.add('loaded');
                        observer.unobserve(wrapper);
                    };

                    img.onerror = () => {
                        wrapper.classList.remove('loading');
                        wrapper.classList.add('loaded'); // ✅ Mark as loaded even on error
                        if (errorMsg) errorMsg.style.display = 'block';
                        observer.unobserve(wrapper);
                    };
                }
            }
        });
    }, {
        root: null,
        rootMargin: '50px',
        threshold: 0
    });

    // ✅ OBSERVE ALL IMAGE WRAPPERS (use consistent class name)
    document.querySelectorAll('.image-wrapper:not(.loaded)').forEach(wrapper => {
        observer.observe(wrapper);
    });
}

// Initial load
document.addEventListener('livewire:init', () => {
    setTimeout(() => {
        lazyLoading();
    }, 100);
});

// ✅ Re-initialize after Livewire updates
document.addEventListener('livewire:navigated', () => {
    setTimeout(() => {
        lazyLoading();
    }, 100);
});
