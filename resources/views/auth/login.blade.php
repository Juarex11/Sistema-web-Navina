<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen w-screen flex items-center justify-center bg-gradient-to-br from-pink-100 to-purple-100">

    <div class="grid grid-cols-1 md:grid-cols-2 shadow-2xl rounded-2xl overflow-hidden bg-white h-35w-full max-w-4xl">

        <!-- Parte izquierda con imagen -->
        <div class="hidden md:flex items-center justify-center bg-pink-50 p-6">
            <img src="{{ asset('images/Navina_logo.webp') }}" 
                alt="Login Image"
                class="w-80 h-auto object-contain drop-shadow-lg">
        </div>

        <!-- Parte derecha -->
        <div class="p-8">

            <h1 class="text-3xl font-bold text-center text-gray-800">
                Inicio de sesión

            </h1>

            <p class="text-center text-gray-500 mt-2 mb-6">
                Ingrese sus credenciales para continuar
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-5">
                    <x-input-label for="email" :value="__('Email')" />

                    <div class="relative mt-2">
                        <img src="{{ asset('images/person.svg') }}"
                            class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 opacity-60">

                        <x-text-input id="email"
                            class="w-full pl-10 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-300 focus:border-pink-400 transition"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required autofocus
                            placeholder="Ingrese su correo" />
                    </div>

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <x-input-label for="password" :value="__('Password')" />

                    <div class="relative mt-2">
                        <img src="{{ asset('images/lock.svg') }}"
                            class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 opacity-60">

                        <x-text-input id="password"
                            class="w-full pl-10 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-pink-300 focus:border-pink-400 transition"
                            type="password"
                            name="password"
                            required
                            placeholder="Ingrese su contraseña" />
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

               

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2.5 rounded-lg shadow-md transition duration-300">
                    Iniciar Sesión
                </button>

            </form>
        </div>

    </div>

</body>
</html>

