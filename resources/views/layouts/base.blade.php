<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === "ar" ? "rtl" : "ltr" }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title : app("site")->title }}</title>
    <meta name="description" content="{{ isset($description) ? Str::limit($description, 160) : Str::limit(app('site')?->description, 160) }}">
    <meta name="keywords" content="{{ isset($tags) ? $tags :  app('site')?->keywords }}">
    <link rel="icon" type="image/png" href="{{ Storage::url(app('site')?->favicon) }}" />
    <meta itemprop="image" content="{{ isset($image) ? Storage::url($image)  : Storage::url(app('site')?->image) }}">
    <link rel='canonical' href='{{ request()->fullUrl() }}' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! app('site')->header !!}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    @if (app()->getLocale() == 'ar')
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">
    @php
    $colors = json_decode(app('site')->theme_color, true);
    @endphp
    <style>
    :root {
        --color-primary: {{ $colors['primary'] ?? '#fbbf24' }};
        --color-primary-hover: {{ $colors['hover'] ?? '#f59e0b' }};
        --color-primary-text: {{ $colors['text'] ?? '#111827' }};
    }
        * {
            text-align: right;
            font-family: "Readex Pro", serif !important;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings: "HEXP" 0;
        }

    </style>

    @else
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @endif

    <style>
        [x-cloak] {
            display: none !important;
        }

        .sticky {
        position: sticky;
        top: 20px;
        }

        .notification-animation {
            animation: slideIn 0.5s ease-out forwards;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .notification-hide {
            animation: slideOut 0.5s ease-in forwards;
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    </style>
</head>

<body class="font-sans antialiased" style="background-image: url('{{ asset('assets/images/wd-furniture-background.jpg') }}');background-repeat: repeat;">
    <x-top-nav />
    <x-nav />
    @yield('content')
    <x-mobile-footer />
    <x-footer />

    {!! app('site')->footer !!}
    <x-whatsapp-btn />
    @livewireScripts
</body>
</html>
