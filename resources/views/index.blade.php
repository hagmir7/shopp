@extends('layouts.base')


@section('content')
    @if (count(app("site")->slides))
        <x-section />
    @endif
    @livewire('home-category')
    <div class="max-w-6xl mx-auto mt-3 px-2 mb-9">
        <h2 class="text-lg md:text-xl py-4 font-bold">{{ __("Top Weekly Picks") }}</h2>
       @livewire('product-list')
    </div>
    <x-feature />
</body>
@endsection
