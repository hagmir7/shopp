<div class="relative h-96 overflow-hidden hidden lg:block">
    <!-- Slides -->
    @foreach (app('site')->slides->where('status', true) as $slide)
    <div class="slide absolute w-full h-full opacity-0 transition-opacity duration-500">
        <img src="{{ Storage::url($slide->image) }}" alt="Slide" class="absolute w-full h-full object-cover">
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-white text-center px-4">
            <div class="slide-content max-w-4xl text-center">
                @if ($slide->title)
                <h2
                    class="slide-element text-border text-4xl md:text-5xl font-bold mb-4 opacity-0 translate-y-10 transition-all duration-700 text-shadow">
                    {{ $slide->title }}
                </h2>
                @endif
                @if ($slide->description)
                <p
                    class="slide-element text-xl md:text-2xl mb-8 opacity-0 translate-y-10 transition-all duration-700 text-shadow">
                    {{ $slide->description }}
                </p>
                @endif
                @if ($slide->text_button)
                <a href="{{ $slide->url }}"
                    class="slide-element btn btn-primary rounded-full mt-3 opacity-0 translate-y-10 transition-all duration-700">
                    {{ $slide->text_button }}
                </a>
                @endif
            </div>
        </div>
    </div>
    @endforeach

    <!-- Navigation Buttons -->
    <button data-dir="prev"
        class="nav-btn absolute left-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white p-4 rounded-full z-20 transition-all duration-300">
        ❮
    </button>
    <button data-dir="next"
        class="nav-btn absolute right-4 top-1/2 -translate-y-1/2 bg-white/30 hover:bg-white/50 text-white p-4 rounded-full z-20 transition-all duration-300">
        ❯
    </button>

    <!-- Navigation Dots -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-20">
        @foreach (app('site')->slides->where('status', true) as $index => $slide)
        <button
            class="dot w-3 h-3 rounded-full bg-white/50 hover:bg-white/70 cursor-pointer transition-all duration-300"
            data-index="{{ $loop->index }}"></button>
        @endforeach
    </div>
</div>

<script>
    (function() {
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const navBtns = document.querySelectorAll('.nav-btn');

    if (!slides.length) return;

    let current = 0;
    let autoplay;

    // Show specific slide
    function show(index) {
        // Hide current
        slides[current].classList.remove('opacity-100');
        slides[current].querySelectorAll('.slide-element').forEach(el => {
            el.classList.remove('opacity-100', 'translate-y-0');
            el.classList.add('opacity-0', 'translate-y-10');
        });
        dots[current].classList.remove('bg-white');
        dots[current].classList.add('bg-white/50');

        // Update index
        current = index;

        // Show new
        slides[current].classList.add('opacity-100');
        setTimeout(() => {
            slides[current].querySelectorAll('.slide-element').forEach((el, i) => {
                setTimeout(() => {
                    el.classList.remove('opacity-0', 'translate-y-10');
                    el.classList.add('opacity-100', 'translate-y-0');
                }, i * 200);
            });
        }, 100);
        dots[current].classList.add('bg-white');
        dots[current].classList.remove('bg-white/50');
    }

    // Navigate
    function navigate(dir) {
        const total = slides.length;
        const next = dir === 'next'
            ? (current + 1) % total
            : (current - 1 + total) % total;
        show(next);
        resetAutoplay();
    }

    // Autoplay
    function startAutoplay() {
        autoplay = setInterval(() => navigate('next'), 9000);
    }

    function resetAutoplay() {
        clearInterval(autoplay);
        startAutoplay();
    }

    // Event listeners
    navBtns.forEach(btn => {
        btn.addEventListener('click', () => navigate(btn.dataset.dir));
    });

    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            show(i);
            resetAutoplay();
        });
    });

    // Keyboard navigation
    document.addEventListener('keydown', e => {
        if (e.key === 'ArrowLeft') navigate('prev');
        if (e.key === 'ArrowRight') navigate('next');
    });

    // Touch/swipe
    let touchStart = 0;
    document.addEventListener('touchstart', e => {
        touchStart = e.touches[0].clientX;
    });
    document.addEventListener('touchend', e => {
        const diff = touchStart - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) navigate(diff > 0 ? 'next' : 'prev');
    });

    // Initialize
    show(0);
    startAutoplay();
})();
</script>
