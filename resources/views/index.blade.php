@extends('layouts.base')



@section('content')
<x-section />

    @livewire('home-category')
    <div class="max-w-7xl mx-auto mt-3 px-2 mb-9">
        <h2 class="text-xl md:text-2xl py-4 font-bold">Top Weekly Picks</h2>
       @livewire('product-list')
    </div>
</body>

@endsection
