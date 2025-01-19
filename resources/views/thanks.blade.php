@extends('layouts.base')

@section('content')
<main class="relative flex flex-1 flex-col overflow-hidden px-4 py-8 sm:px-6 lg:px-8"><img
        src="/plus/img/beams-cover@95.jpg" alt="" class="absolute top-0 left-1/2 -ml-[47.5rem] w-[122.5rem] max-w-none">
    <div class="absolute inset-0 text-slate-900/[0.07] [mask-image:linear-gradient(to_bottom_left,white,transparent,transparent)]">
        <svg class="absolute inset-0 h-full w-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid-bg" width="32" height="32" patternUnits="userSpaceOnUse" x="100%"
                    patternTransform="translate(0 -1)">
                    <path d="M0 32V.5H32" fill="none" stroke="currentColor"></path>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid-bg)"></rect>
        </svg>
    </div>
    <div class="relative flex flex-1 flex-col items-center justify-center pt-12 pb-16">
        <img class="mx-auto mb-10 h-20 w-auto text-slate-900" src="{{ asset("assets/images/check-icon.png") }}" alt="Thank you for you order">
        <div class="max-w-2xl text-center">
            <h1 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">Thank You for Your Order!</h1>
            <div class="mt-6 text-base/7 text-slate-600">{{ __('We’ve received your order and are preparing it for shipment') }}
                <!-- --> <strong class="font-semibold text-slate-900">{{ __('click the “Confirm your subscription”') }}
                    </strong> <!-- -->{{ __("Our team is getting your order ready.") }}
            </div><a
                class="inline-flex justify-center rounded-lg text-sm font-semibold py-2.5 px-4 bg-slate-900 text-white hover:bg-slate-700 mt-6"
                href="/"><span>{{ __("Back to Products") }}</span></a>
        </div>
    </div>
    <footer class="relative shrink-0">
        <div class="relative z-10 flex flex-none items-center justify-center">
            <svg width="32" height="32" fill="none"
                class="flex-none">
                <path d="M8.75 3.5H22V2H8.75v1.5zM3.5 23.25V8.75H2v14.5h1.5zM23 28.5h-2V30h2v-1.5zm-12 0H8.75V30H11v-1.5zm10 0h-5V30h5v-1.5zm-5 0h-5V30h5v-1.5zM2 23.25A6.75 6.75 0 008.75 30v-1.5a5.25 5.25 0 01-5.25-5.25H2zM23 30a5 5 0 005-5h-1.5a3.5 3.5 0 01-3.5 3.5V30zM22 3.5A4.5 4.5 0 0126.5 8H28a6 6 0 00-6-6v1.5zM8.75 2A6.75 6.75 0 002 8.75h1.5c0-2.9 2.35-5.25 5.25-5.25V2z"
                    class="fill-gray-400"></path>
                <path d="M14.75 12.75a2 2 0 012-2h10.5a2 2 0 012 2v7.5a2 2 0 01-2 2h-10.5a2 2 0 01-2-2v-7.5z"
                    class="stroke-gray-600" stroke-width="1.5"></path>
                <path d="M15.5 11.5l4.512 3.992a3 3 0 003.976 0L28.5 11.5" class="stroke-gray-600" stroke-width="1.5">
                </path>
                <path d="M9 11v4M9 19v.01" class="stroke-gray-600" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></path>
            </svg>
            <p class="ml-6 max-w-lg flex-auto text-md text-gray-600"><strong class="font-semibold text-gray-900">
               {{ __('If you have any question you can contact as at') }}</strong> {{ app("site")->email }}</p>
        </div>
    </footer>
</main>
@endsection
