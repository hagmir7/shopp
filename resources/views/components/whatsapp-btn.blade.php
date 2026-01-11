@if (app('site')->phone)
<!-- WhatsApp Floating Button -->
<a href="https://wa.me/{{ str_replace(['+', ' ', '-'], '', app('site')->phone) }}" target="_blank" aria-label="{{ __('Chat on WhatsApp!') }}" class="whatsapp-float fixed bottom-20 right-4 sm:bottom-6 sm:right-6 z-50
          flex items-center justify-center
          w-14 h-14 sm:w-16 sm:h-16
          rounded-full bg-gradient-to-br from-green-400 to-green-600
          shadow-lg hover:shadow-2xl
          transition-all duration-300
          hover:scale-110 active:scale-95
          group">

    <!-- Pulse Ring Animation -->
    <span
        class="absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-0 group-hover:animate-ping"></span>

    <!-- Ripple Effect -->
    <span class="absolute inline-flex h-full w-full rounded-full bg-green-400 animate-pulse-slow opacity-75"></span>

    <!-- WhatsApp Icon -->
    <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white relative z-10 transform group-hover:rotate-12 transition-transform duration-300"
        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
        <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
    </svg>

    <!-- Tooltip (Optional) -->
    <span
        class="absolute right-full mr-3 px-3 py-2 bg-gray-900 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap pointer-events-none">
        {{ __("Chat with us!") }}
    </span>
</a>

<style>
    @keyframes pulse-slow {

        0%,
        100% {
            opacity: 0.75;
            transform: scale(1);
        }

        50% {
            opacity: 0.5;
            transform: scale(1.05);
        }
    }

    .animate-pulse-slow {
        animation: pulse-slow 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    /* Fade in animation on page load */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .whatsapp-float {
        animation: fadeInUp 0.6s ease-out;
    }

    /* Mobile bounce animation */
    @media (max-width: 640px) {
        .whatsapp-float {
            animation: fadeInUp 0.6s ease-out, gentle-bounce 3s ease-in-out 1s infinite;
        }
    }

    @keyframes gentle-bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }
</style>

@endif
