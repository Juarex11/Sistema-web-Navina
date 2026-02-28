<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Basic Icons -->
  <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
  <!-- Filled Icons -->
  <link href="https://cdn.boxicons.com/3.0.8/fonts/filled/boxicons-filled.min.css" rel="stylesheet">
  <!-- Brand Icons -->
  <link href="https://cdn.boxicons.com/3.0.8/fonts/brands/boxicons-brands.min.css" rel="stylesheet">
  <title>Dashboard</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-w-screen max-h-screen flex ">

  @include('dashboard.sidebar')

  <div class="grow flex flex-col ">

    @include('dashboard.header')

    @yield('content')
    
  </div>
</body>

</html>