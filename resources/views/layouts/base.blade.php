<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title : config("app.name") }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @if (app()->getLocale() == 'ar')
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@160..700&display=swap" rel="stylesheet">
    <style>
        * {
            text-align: right;
            font-family: "Readex Pro", serif !important;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings: "HEXP" 0;
        }

    </style>
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

<body class="font-sans antialiased"
    style="background-image: url('https://floorwarehouse.co.uk/wp-content/uploads/2024/04/wd-furniture-background.jpg');background-repeat: repeat;">
    <x-top-nav />
    <x-nav />
    @yield('content')
    <x-mobile-footer />
    <x-footer />
</body>

</html>
