<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<div class="relative h-96 overflow-hidden hidden lg:block">
    <!-- Slide 1 -->
    @foreach (app('site')->slides->where('status', true) as $slide)
    <div class="slide absolute w-full h-full opacity-0">
        <img src="{{ Storage::url($slide->image) }}" alt="Slide 1" class="absolute w-full h-full object-cover">
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-white text-center px-4">
            <div class="slide-content max-w-4xl">
                @if ($slide->title)
                <h2 class="text-5xl md:text-6xl font-bold mb-4 opacity-0 translate-y-10 text-border">{{ $slide->title }}
                </h2>
                @endif
                @if ($slide->description)
                <p class="text-xl md:text-2xl mb-8 opacity-0 translate-y-10 text-border">{{ $slide->description }}</p>
                @endif
                @if ($slide->text_button)
                <a href="{{ $slide->url }}"
                    class="opacity-0 translate-y-10 bg-[#cba155] text-white px-8 py-2  rounded-full text-lg font-semibold transform transition-transform duration-300 hover:scale-105">
                    {{ $slide->text_button }}
                </a>
                @endif

            </div>
        </div>
    </div>
    @endforeach

    <!-- Navigation Buttons -->
    <button id="left"
        class="absolute hidden lg:block left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-30 hover:bg-opacity-50 text-white p-4 rounded-full z-20 transition-all duration-300">
        ❮
    </button>
    <button id="right"
        class="absolute hidden lg:block right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-30 hover:bg-opacity-50 text-white p-4 rounded-full z-20 transition-all duration-300">
        ❯
    </button>

    <!-- Navigation Dots -->

    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex gap-3 z-20">
        @foreach (app('site')->slides->where('status', true) as $slide)
        <div class="w-3 h-3 dots rounded-full bg-white bg-opacity-50 cursor-pointer transition-all duration-300"></div>
        @endforeach
    </div>
</div>
<script>
    let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dots');
        const totalSlides = slides.length;
        let autoPlayInterval;

        // GSAP Timeline for slide animations
        function animateSlideContent(slide) {
            const timeline = gsap.timeline();
            const content = slide.querySelectorAll('.slide-content > *');

            timeline
                .to(slide, { opacity: 1, duration: 0.5 })
                .to(content, {
                    opacity: 1,
                    y: 0,
                    duration: 0.7,
                    stagger: 0.2,
                    ease: "power2.out"
                });

            return timeline;
        }

        function hideSlideContent(slide) {
            const content = slide.querySelectorAll('.slide-content > *');
            gsap.set(content, { opacity: 0, y: 20 });
            gsap.set(slide, { opacity: 0 });
        }

        function showSlide(index) {
            // Hide current slide
            gsap.to(slides[currentSlide], {
                opacity: 0,
                duration: 0.5,
                onComplete: () => {
                    hideSlideContent(slides[currentSlide]);
                }
            });

            // Update dots
            dots.forEach(dot => {
                dot.classList.remove('bg-opacity-100');
                dot.classList.add('bg-opacity-50');
            });
            dots[index].classList.add('bg-opacity-100');
            dots[index].classList.remove('bg-opacity-50');

            // Show new slide
            currentSlide = index;
            animateSlideContent(slides[currentSlide]);
        }

        function nextSlide() {
            showSlide((currentSlide + 1) % totalSlides);
        }

        function previousSlide() {
            showSlide((currentSlide - 1 + totalSlides) % totalSlides);
        }

        // Initialize first slide
        animateSlideContent(slides[0]);
        dots[0].classList.add('bg-opacity-100');

        // Event listeners for navigation buttons
        document.querySelector('#left').addEventListener('click', () => {
            previousSlide();
            resetAutoPlay();
        });

        document.querySelector('#right').addEventListener('click', () => {
            nextSlide();
            resetAutoPlay();
        });

        // Auto play functionality
        function startAutoPlay() {
            autoPlayInterval = setInterval(nextSlide, 9000);
        }

        function resetAutoPlay() {
            clearInterval(autoPlayInterval);
            startAutoPlay();
        }

        // Start auto play
        startAutoPlay();

        // Add keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                previousSlide();
                resetAutoPlay();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
                resetAutoPlay();
            }
        });

        // Add touch support
        let touchStartX = 0;
        let touchEndX = 0;

        document.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            const difference = touchStartX - touchEndX;

            if (Math.abs(difference) > swipeThreshold) {
                if (difference > 0) {
                    nextSlide();
                } else {
                    previousSlide();
                }
                resetAutoPlay();
            }
        }
</script>
