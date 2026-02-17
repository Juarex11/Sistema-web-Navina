<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-w-screen min-h-screen flex justify-center items-center bg-neutral-900 text-white">

  <form class="p-4 flex flex-col gap-3 rounded-lg bg-neutral-800"
    action="{{ route('login') }}"
    method="POST">
    @csrf

    <div class="flex flex-col">
      <label for="email">Correo</label>

      <input 
      type="email" 
      name="email" 
      autocomplete="off"
      value="{{ old('email') }}" 
      required>
    </div>

    <div class="flex flex-col">
      <label for="password">Contraseña</label>
      <input type="password" name="password" required>
    </div>

    @if ($errors->any())
    <div style="color:red;">
      {{ $errors->first() }}
    </div>
    @endif

    <button class="py-1 bg-pink-500 rounded-xl"
      type="submit">
      Ingresar
    </button>
  </form>

</body>
</html>