@extends('layouts.base')

@section('content')
<div class="max-w-3xl mx-auto mt-3 px-2 mb-9">
    <h1 class="text-xl md:text-2xl py-4 font-bold">{{ $page->title }}</h1>
    <p class="mb-3 font-bold">{{ __("Last updated") }} {{ $page->updated_at }}</p>
    <div class="mb-4">
        {!! $page->content !!}
    </div>
</div>
@endsection
