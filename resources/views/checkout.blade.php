@extends('layouts.base')

@section('content')
<div class="max-w-7xl mx-auto mt-3 px-2 mb-9">
    {{-- <h2 class="text-xl md:text-xl py-4 font-bold">{{ __("Contact us") }}</h2> --}}
    @livewire('checkout-form')
</div>
@endsection
