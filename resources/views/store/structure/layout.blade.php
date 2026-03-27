<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS de Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- JS de Swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Tailwind CSS-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Estructura</title>
</head>

<body>
    <div>
        @include('components.navbar-principal')
    </div>
    <div class="py-16">
        @yield('content')
    </div>
    <div>
    </div>
</body>

</html>