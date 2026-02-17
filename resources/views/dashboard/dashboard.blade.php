<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-w-screen min-h-screen bg-neutral-900 text-white">

  <h1 class="text-5xl font-semibold pb-5">Dashboard</h1>

  <form action="{{ route('logout') }}" method="POST">
    @csrf

    <button class="py-1 px-3 bg-red-500 rounded-lg"
      type="submit">
      Cerrar sesion
    </button>

  </form>

</body>

</html>