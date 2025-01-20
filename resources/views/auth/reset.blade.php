@extends('layouts.base')


@section('content')
<div class="px-4 py-10 md:max-w-6xl md:mx-auto">
    @livewire('reset-form', ['token' => $token])
</div>
@endsection
