import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

class ProductShowcase {
    constructor() {
        this.mainImage = document.getElementById('mainImage');
        this.addToCartBtn = document.getElementById('addToCartBtn');
        this.init();
    }

    init() {
        this.initSwiper();
        this.setupEventListeners();
    }

    initSwiper() {
        this.swiper = new Swiper('.product-thumbnails', {
            modules: [Navigation],
            slidesPerView: 'auto',
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                },
                640: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
            },
        });
    }

    setupEventListeners() {
        // Handle thumbnail clicks
        const thumbnails = document.querySelectorAll('.swiper-slide img');
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => this.updateMainImage(thumb.src));
        });

        // Handle add to cart
        if (this.addToCartBtn) {
            this.addToCartBtn.addEventListener('click', () => this.handleAddToCart());
        }
    }

    updateMainImage(src) {
        if (this.mainImage) {
            this.mainImage.src = src;
        }
    }

    handleAddToCart() {
        // Implement your add to cart logic here
        console.log('Add to cart clicked');
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new ProductShowcase();
});
