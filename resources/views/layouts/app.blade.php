<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
        <!-- Basic Icons -->
        <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
        <!-- Filled Icons -->
        <link href="https://cdn.boxicons.com/3.0.8/fonts/filled/boxicons-filled.min.css" rel="stylesheet">
        <!-- Brand Icons -->
        <link href="https://cdn.boxicons.com/3.0.8/fonts/brands/boxicons-brands.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased" x-data="{ sidebarOpen: true }">
        <div class="min-h-screen  flex">

            <aside  class=" text-white h-screen fixed left-0 top-0 transition-all duration-300"
                    :class="sidebarOpen ? 'w-64' : 'w-0 overflow-hidden'">
                    @include('dashboard.layout.sidebar')
            </aside>

            <div class="flex-1 h-screen overflow-y-auto transition-all duration-300"
                :class="sidebarOpen ? 'ml-64' : 'ml-0'">

                <button @click="sidebarOpen = !sidebarOpen"
                        class="fixed top-4 z-50 bg-gray-800 text-white px-2 py-1 rounded transition-all duration-300"
                        :class="sidebarOpen ? 'left-64' : 'left-2'">
                    +
                </button>

                @include('layouts.navigation')

                <main class="p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
