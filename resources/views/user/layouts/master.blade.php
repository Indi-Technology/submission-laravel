<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Napuniverse - Blog</title>
</head>
<body>
    <!-- Navigation -->
    @include('user.layouts.navigation')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Content -->
    <div class="container mx-auto">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('user.layouts.footer')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>