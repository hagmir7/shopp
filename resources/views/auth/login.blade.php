@extends('layouts.base')


@section('content')
<section id="contact" class="px-1 md:mx-auto relative overflow-hidden bg-accent-red py-4">
    <div class="relative z-10 grid px-1 md:max-w-7xl md:mx-auto">
        <h1 class="text-center text-2xl mb-4 font-semibold">{{ __("Login To Your Account") }}</h1>
        <div class="flex items-center justify-center lg:py-0 w-full">
            <div class="w-full bg-white rounded-lg max-w-lg shadow">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    @livewire('login-form')
                </div>
            </div>
        </div>

    </div>

    <div class="absolute z-0 rounded-full bg-accent-blue w-28 h-28 md:w-80 md:h-80 md:-top-36 md:-right-28 -top-12 -right-6 animate__animated animate__zoomIn"
        x-animate="zoomIn" style="--animate-duration: 1s;">
    </div>
    <div class="bg-gray-300 hidden md:block w-80 h-80 rounded-full absolute z-0 md:-bottom-36 md:-left-28 animate__animated animate__zoomIn"
        x-animate="zoomIn" style="--animate-duration: 1s;">
    </div>
</section>
@endsection
