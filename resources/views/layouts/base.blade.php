<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title : config("app.name") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:text-white/50" style="background-image: url('https://floorwarehouse.co.uk/wp-content/uploads/2024/04/wd-furniture-background.jpg');background-repeat: repeat;">
        <x-top-nav />
        <x-nav />
        @yield('content')

        <x-mobile-footer />

        <x-footer />
    </body>
</html>
