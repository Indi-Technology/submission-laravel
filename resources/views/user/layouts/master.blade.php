<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Napuniverse - Blog</title>
</head>
<body>
    <div id="preloader">
        <div id="loader" class="h-screen flex justify-center items-center"><span class="loading loading-dots loading-md"></span></div>
    </div>

    <!-- Navigation -->
    @include('user.layouts.navigation')

    <!-- Content -->
    <div class="container mx-auto">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('user.layouts.footer')

    <script>
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            preloader.style.display = 'none';
        });
    </script>

</body>
</html>