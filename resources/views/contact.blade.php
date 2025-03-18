@extends('layouts.base')

@section('content')
<div class="max-w-2xl mx-auto mt-3 px-2 mb-9">
    <h1 class="text-xl md:text-xl py-4 font-bold">{{ __("Contact us") }}</h1>
    <div class="mb-4">
        <p class="mb-4">
            {{ __('We are happy to hear from you! Whether you have questions about our store, want to suggest a topic, or need help with a request, we are here to assist you.') }}
        </p>
        <ul class="space-y-2 mb-4">
            @if (app("site")->phone)
                <li>
                    <strong>{{ __('Phone') }}:</strong>
                    <a href="tel:{{ app("site")->phone }}" class="text-blue-600 hover:underline">
                        {{ app("site")->phone }}
                    </a>
                </li>
            @endif
            <li>
                <strong>{{ __('Email') }}:</strong>
                <a href="mailto:{{ app("site")->email }}" class="text-blue-600 hover:underline">
                    {{ app("site")->email }}
                </a>
            </li>
            <li>
                <strong>{{ __('Hours') }}:</strong>
                {{ __('Monday - Friday, 9:00 AM - 5:00 PM Eastern Time') }}
            </li>
        </ul>

        <h2 id="send-us-a-message" class="text-2xl font-bold mb-3">
            {{ __('Send Us a Message') }}
        </h2>

        <p>
            {{ __('Use the form below to send us a message, and we will get back to you as soon as possible.') }}
        </p>
    </div>
    @livewire('contact-form')
</div>
@endsection
