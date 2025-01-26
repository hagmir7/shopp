@extends('layouts.base')

@section('content')
<section class="max-w-6xl mx-auto px-4 mt-6">
    <h1 class="text-xl font-bold text-gray-900 mb-2">{{ __("Browse all our categories") }}</h1>
    {{-- <p class="text-gray-600 mb-4">
        Explore Floor Warehouse's premium selection of Solid & Engineered Wood, Luxury Vinyl Tiles, and Laminate
        Flooring, sourced from top suppliers to ensure quality and innovation at unbeatable prices. Discover your
        perfect floor and order free samples today!
    </p> --}}
</section>
@livewire('category-list')
@endsection
