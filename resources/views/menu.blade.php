@extends('layouts.base')


@section('content')
    <div class="max-w-xl m-auto shadow-sm border border-gray-200 rounded-lg bg-white my-6 overflow-hidden">
        <nav class="divide-y">
            <x-nav.mobile-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav.mobile-link>
            @foreach (app("site")->urls->where('mobile_menu') as $item)
            <a href="{{ $item->path }}" class="block px-4 py-3 hover:bg-gray-50">{{ $item->name }}</a>
            @endforeach
        </nav>
    </div>
@endsection
