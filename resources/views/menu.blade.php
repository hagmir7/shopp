@extends('layouts.base')


@section('content')
    <div class="max-w-xl m-auto shadow-sm border border-gray-200 rounded-lg bg-white my-6 overflow-hidden">
        <nav class="divide-y">
            @auth
            <x-nav.mobile-link href="{{ route('profile') }}" :active="request()->routeIs('profile')">
                {{ __('Profile') }}
            </x-nav.mobile-link>
            @endauth

            <x-nav.mobile-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav.mobile-link>

            @foreach (app("site")->urls->where('mobile_menu') as $item)
            <a href="{{ $item->path }}" class="block px-4 py-3 hover:bg-gray-50">{{ $item->name }}</a>
            @endforeach

            @guest
            <x-nav.mobile-link href="{{ route('auth.login') }}" :active="request()->routeIs('login')">
                {{ __('Login') }}
            </x-nav.mobile-link>
            <x-nav.mobile-link href="{{ route('auth.register') }}" :active="request()->routeIs('register')">
                {{ __('Register') }}
            </x-nav.mobile-link>
            @endguest

            @auth
            <x-nav.mobile-link href="{{ route('auth.logout') }}" :active="request()->routeIs('auth.logout')">
                {{ __('Logout') }}
            </x-nav.mobile-link>
            @endauth
        </nav>
    </div>
@endsection
